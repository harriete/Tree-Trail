define(function(require){

  var EventEmitter = require('eventemitter');

  function Store(){
    EventEmitter.call(this);
    this.data = [];
    this.read();
  }

  Store.prototype = $.extend(Object.create(EventEmitter.prototype), {
    create: function(badgeData){
      var store = this;
      return $.post('/badges', badgeData)
        .then(function(response){
          store.data.push(response);
          store.trigger('change', [store.data]);
        }, function(error){

        });
    },
    read: function(){
      var store = this;
      return $.get('/badges')
        .then(function(response){
          store.data = response;
          store.trigger('change', [store.data]);
        }, function(error){

        });
    },
    update: function(){},
    delete: function(){},
    getState: function(){
      return this.data;
    },
  });

  return new Store();

});