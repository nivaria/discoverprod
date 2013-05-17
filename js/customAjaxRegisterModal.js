(function ($) {

  /**
   * Provide the HTML for the custom Ajax modal
   */
  Drupal.theme.prototype.custom_ajax_register_modal = function () {
    var html = '';

    html += '  <div id="ctools-modal">'
    html += '    <div class="ctools-modal-content custom-ajax-register-modal">'
    html += '      <div class="modal-header">';
    html += '        <a class="close" href="#">';
    html +=            Drupal.CTools.Modal.currentSettings.closeText + Drupal.CTools.Modal.currentSettings.closeImage;
    html += '        </a>';
    html += '      </div>';
    html += '      <div id="modal-content" class="modal-content">';
    html += '      </div>';
    html += '    </div>';
    html += '  </div>';

    return html;
  }

})(jQuery);