var submitResponseController = Marionette.Object.extend({

    initialize: function() {
        this.listenTo( Backbone.Radio.channel( 'forms' ), 'submit:response', this.submitResponse );
    },

    submitResponse: function( response, textStatus, jqXHR ) {
        console.log( response );
    }

});

new submitResponseController();
