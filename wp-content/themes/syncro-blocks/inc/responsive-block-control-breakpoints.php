<?php
function syncro_blocks_override_responsive_block_control_add_css() {
      return false;
  }
  add_filter('responsive_block_control_breakpoints', 'syncro_blocks_override_responsive_block_control_add_css');