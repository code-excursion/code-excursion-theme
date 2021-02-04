module.exports = {
	extends: [ '@wearerequired/stylelint-config' ],
	rules: {
		'value-keyword-case': [ 'lower', { ignoreProperties: [ /--font__/ ] } ],
		'no-descending-specificity': null,
	},
};
