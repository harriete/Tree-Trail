define(function(require) {

  var EventEmitter = require('eventemitter');
  var Badges = require('stores/badges');

  function Store() {
    var store = this;
    EventEmitter.call(this);
    this.data = {};
    this.badges = Badges.getState();

    Badges.on('change', function(data) {
      store.badges = data;
    });
  }

  Store.prototype = $.extend(Object.create(EventEmitter.prototype), {
    update: function(data) {
      this.data = this.badges.filter(function(badge){
        return badge.id == data.id;
      })[0] || {};
      this.trigger('change', [this.data]);
    },
    getState: function() {
      return this.data;
    },
  });

  return new Store();

});
