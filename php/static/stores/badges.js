define(function(require) {

  var EventEmitter = require('eventemitter');

  function Store() {
    EventEmitter.call(this);
    this.data = [];
    this.read();
  }

  Store.prototype = $.extend(Object.create(EventEmitter.prototype), {
    create: function(badgeData) {
      var store = this;
      return $.post('/badges', badgeData)
        .then(function(response) {
          store.data.push(response);
          store.trigger('change', [store.data]);
        }, function(error) {

        });
    },
    read: function() {
      var store = this;
      return $.get('/badges')
        .then(function(response) {
          store.data = response;
          store.trigger('change', [store.data]);
        }, function(error) {

        });
    },
    update: function() {},
    delete: function(badgeData) {
      var store = this;
      return $.ajax({
        type: 'delete',
        url: '/badges/' + badgeData.id,
      }).then(function() {
        var dataLength = store.data.length;
        while(dataLength--)
          if(store.data[dataLength].id === badgeData.id)
            store.data.splice(dataLength, 1);
        store.trigger('change', [store.data]);
      }, function() {

      });

    },
    getState: function() {
      return this.data;
    },
  });

  return new Store();

});
