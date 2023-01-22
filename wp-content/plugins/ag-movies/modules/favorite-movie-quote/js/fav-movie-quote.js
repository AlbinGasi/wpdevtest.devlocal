wp.blocks.registerBlockType('my-custom-blocks/favorite-movie-quote', {
    title: 'Favorite Movie Quote',
    icon: 'format-quote',
    category: 'common',
    attributes: {
        quote: {
            type: 'string',
        }
    },
    edit: function(props) {
        function updateQuote(event) {
            props.setAttributes({quote: event.target.value})
        }
        return wp.element.createElement(
            "div",
            null,
            wp.element.createElement(
                "h3",
                null,
                "Favorite Movie Quote"
            ),
            wp.element.createElement("input", {
                type: "text",
                value: props.attributes.quote,
                onChange: updateQuote
            })
        );
    },
    save: function(props) {
        return wp.element.createElement(
            "blockquote",
            null,
            props.attributes.quote
        );
    }
})