$.fn.scrollPagination = function(callback) {
  $(this).scroll(function(e) {
    if (this.scrollHeight <= (this.scrollTop + this.offsetHeight)) {
      if (callback && typeof callback == 'function') {
        callback.call(this, e);
      }
    }
  });
}
