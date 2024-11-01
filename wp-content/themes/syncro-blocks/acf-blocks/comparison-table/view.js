document.querySelectorAll('.wp-block-syncro-comparison-table td.row-label').forEach((element) => {
    element.addEventListener('click', function (event) {
        if( window.innerWidth > 781 ){
            return;
        }
      const currentTd = event.currentTarget;
      const tableRows = document.querySelectorAll( '.wp-block-syncro-comparison-table tr' );
      const siblings = Array.from(tableRows).filter(
        (child) => child !== currentTd.closest('tr')
      );
  
      // Get the content row that should expand or collapse
      const row = currentTd.closest('tr'); // Assume the content row is the immediate sibling
  
      // Toggle the open class
      if (row.classList.contains('open')) {
        // Collapse the row
        row.style.height = `${row.scrollHeight}px`; // Set to full height to enable transition
        requestAnimationFrame(() => {
          row.style.height = '64px';
        });
      } else {
        // Expand the row
        row.style.height = `${row.scrollHeight}px`; // Set to full height
        row.addEventListener('transitionend', function handleTransition() {
          // Remove the explicit height after the transition so it can grow/shrink naturally
          row.style.height = 'auto';
          row.removeEventListener('transitionend', handleTransition);
        });
      }
  
      // Toggle the "open" class after setting the height
      row.classList.toggle('open');
  
      // Collapse all other open rows
      siblings.forEach((sibling) => {
        if (sibling.classList.contains('open')) {
          sibling.style.height = `${sibling.scrollHeight}px`;
          requestAnimationFrame(() => {
            sibling.style.height = '64px';
          });
          sibling.classList.remove('open');
        }
      });
    });
  });
  