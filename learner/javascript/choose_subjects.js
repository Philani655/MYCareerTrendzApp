new MultiSelectTag('subjects', {
    placeholder: 'Search Subjects', // default Search...
    tagColor: {
        textColor: '#327b2c',
        borderColor: '#92e681',
        bgColor: '#eaffe6',
        width: 5,
    },
    onChange: function (values) {
        console.log(values)
    }
}
)