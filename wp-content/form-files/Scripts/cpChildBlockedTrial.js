  // Form ID and tenant info
  var formID = "#pardot-form"; // Padrot form ID, almost always is #pardot-form
  var tenantDomain = "syncro"; // REPLACE and remove square brackets
  var tenantRouter = "Blocked_Trial_Inbound_Router"; // REPLACE and remove square brackets

  // Debugging and retry
  var debugMessages = true; // Do you want to see what data is being submitted to Chili Piper?
  var retryFormSearch = true; // Should we retry if the form is not found by id on script load
  //
  // No changes should be necessary from this point
  //
  // Get form
  var form = document.querySelector(formID);
  addFormListener();
  // Retry adding the form event listener
  var count = 1;
  function addFormListener() {
    count++;
    if (form) {
      form.addEventListener("submit", submitHandler);
      return;
    } else if ((typeof retryFormSearch !== "undefined" ? retryFormSearch : true) && count < 10) {
      setTimeout(() => {
        form = document.querySelector(formID);
        addFormListener();
      }, 1000);
    } else {
      console.log("no form found on this page, id used - " + formID);
      return;
    }
  }
  // Submit button click handler
  function submitHandler(event) {
    // Post DOM message
    window.parent.postMessage(
      {
        message: "PARDOT_DATA_READY",
        data: getLeadObject(tenantDomain, tenantRouter, form),
      },
      "*"
    );
  }
  // Get Lead object from form fields
  function getLeadObject(tenantDomain, tenantRouter, form) {
    // Loop through all form elements and map
    var data = {
      CPTenantDomain: tenantDomain,
      CPTenantRouter: tenantRouter,
    };
    // Save label names
    var labelsDict = {};
    form.querySelectorAll("label").forEach((label) => {
      labelsDict[label.htmlFor] = stripText(label.textContent);
    });
    // Fill lead object
    for (var i = 0, elem; (elem = form.elements[i++]); ) {
      var field_name; // Reset field name - this was not being reset for some reason
      if (elem.type.includes("submit") || elem.type.includes("fieldset")) {
        continue;
      } else if (elem.type.includes("select")) {
        // Get the field name from label or element text
        var field_name = parseClassNames(elem.parentElement.className) || elem.options[0].value || stripText(elem.options[0].text) || labelsDict[elem.name];
        if (!field_name) {
          if (typeof debugMessages !== "undefined" ? debugMessages : true) {
            console.log("failed to find a valid field name for " + elem.name);
          }
          continue;
        }
        // Save to lead obj
        if (elem.selectedIndex === 0) {
          data[field_name] = "[not provided]";
        } else {
          data[field_name] = elem.options[elem.selectedIndex].text;
        }
      } else if (elem.type === "hidden" || elem.parentElement.className.includes("hidden")) {
        // Get the field name from class name
        var field_name = parseClassNames(elem.parentElement.className) || elem.name;
        if (!field_name) {
          if (typeof debugMessages !== "undefined" ? debugMessages : true) {
            console.log("failed to find a valid field name for " + elem.name);
          }
          continue;
        }
        // Save to lead obj
        data[field_name] = (v = elem.value) ? v : "[not provided]";
      } else {
        // Get the field name from label or element placeholder
        var field_name = parseClassNames(elem.parentElement.className) || stripText(elem.placeholder) || labelsDict[elem.name] || labelsDict[elem.id];
        if (!field_name) {
          if (typeof debugMessages !== "undefined" ? debugMessages : true) {
            console.log("failed to find a valid field name for " + elem.name);
          }
          continue;
        }
        // Save to lead obj
        if (["radio", "checkbox"].includes(elem.type)) {
          data[field_name] = typeof elem.checked !== "undefined" ? elem.checked : "[not provided]";
        } else {
          data[field_name] = elem.value || "[not provided]";
        }
      }
    }
    if (typeof debugMessages !== "undefined" ? debugMessages : true) {
      // Log data and labels for debugging
      console.log(labelsDict);
      console.log(data);
    }
    return data;
  }
  // Strip characters and spaces
  function stripText(text) {
    return camelText(text).replace(/[^\w]/gi, "");
  }
  // Make text more readable
  function camelText(str) {
    return str.replace(/(?:^\w|[A-Z]|\b\w|\s+)/g, function (match, index) {
      if (+match === 0) return "";
      return match.toUpperCase();
    });
  }
  // Get field name from parent class
  function parseClassNames(className) {
    var field_classes = className.split(" ").filter((value) => !["", "form-field", "pd-hidden", "hidden"].includes(value));
    for (var i in field_classes) {
      if (field_classes[i].includes("CP_")) {
        return field_classes[i];
      }
    }
    return undefined;
  }