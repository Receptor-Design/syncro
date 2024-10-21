class GhubContentToggle {
	constructor(wrapper) {
		this.container = document.querySelectorAll(wrapper);

		this.container.forEach((item) => {
			const toggle = item.querySelector("input");
			const inactive = item.dataset.inactive;
			const active = item.dataset.active;
			const toggleLeftText = item.querySelector(".ghub-left-content");
			const toggleRightText = item.querySelector(".ghub-right-content");
			const inactiveClass = document.querySelectorAll(`${inactive}`);
			const activeClass = document.querySelectorAll(`${active}`);

			activeClass.forEach((item) => {
				item.classList.add("ghub-ct-hidden");
			});

			toggleLeftText.classList.add("ghub-active");

			toggle.addEventListener("change", () => {
				if (toggle.checked) {
					inactiveClass.forEach((item) => {
						item.classList.add("ghub-ct-hidden");
					});

					activeClass.forEach((item) => {
						item.classList.remove("ghub-ct-hidden");
					});

					toggleRightText.classList.add("ghub-active");
					toggleLeftText.classList.remove("ghub-active");
				} else {
					activeClass.forEach((item) => {
						item.classList.add("ghub-ct-hidden");
					});

					inactiveClass.forEach((item) => {
						item.classList.remove("ghub-ct-hidden");
					});

					toggleRightText.classList.remove("ghub-active");
					toggleLeftText.classList.add("ghub-active");
				}
			});
		});
	}
}

new GhubContentToggle(".ghub-content-toggle-container");
