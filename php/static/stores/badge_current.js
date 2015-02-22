define(function(require){

  var EventEmitter = require('eventemitter');

  function Store(){
    EventEmitter.call(this);
    this.data = {};
  }

  Store.prototype = $.extend(Object.create(EventEmitter.prototype), {
    update: function(badgeData){
      this.data = badgeData;
      this.trigger('change', [this.data]);
    },
    getState: function(){
      return this.data;
    },
  });

  return new Store();

});