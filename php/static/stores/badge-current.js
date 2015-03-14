define(function(require) {

  var EventEmitter = require('eventemitter');
  var Badges = require('stores/badges');

  function Store() {
    var store = this;
    EventEmitter.call(this);
    this.data = {};
    this.badgeId = null;
    this.badges = Badges.getState();

    Badges.on('change', function(data) {
      store.badges = data;
      store.recalculateCurrentBadge();
    });
  }

  Store.prototype = $.extend(Object.create(EventEmitter.prototype), {
    selectBadge: function(data) {
      this.badgeId = data.id;
      this.recalculateCurrentBadge();
    },
    getState: function() {
      return this.data;
    },
    recalculateCurrentBadge: function(){
      var badgeId = this.badgeId;
      this.data = this.badges.filter(function(badge){
        return badge.id == badgeId;
      })[0] || {};
      this.trigger('change', [this.data]);
    }
  });

  return new Store();

});
