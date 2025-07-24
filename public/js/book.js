const $btn = $('#filterStatusBtn');
const $dropdown = $('#filterDropdown');
const $tooltip = $('#tooltipDropdown');

$(document).on('click', function(e) {
  if ($btn.is(e.target) || $btn.has(e.target).length || $dropdown.has(e.target).length) {
    if ($btn.is(e.target) || $btn.has(e.target).length) {
      $dropdown.toggleClass('hidden');
      $tooltip.toggleClass('!hidden', !$dropdown.hasClass('hidden'));
    }
  } else {
    $dropdown.addClass('hidden');
    $tooltip.removeClass('!hidden');
  }
});
