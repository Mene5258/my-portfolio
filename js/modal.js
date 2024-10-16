'use strict';

document.addEventListener('DOMContentLoaded', function () {
  const showModalButton = document.getElementById('showModal');
  const modal = new bootstrap.Modal(document.getElementById('exampleModal'));

  showModalButton.addEventListener('click', function () {
    modal.show();
  });
});