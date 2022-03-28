/**
 * WordPress dependencies
 */
import { __ } from '@wordpress/i18n';
const variations = [
	{
		name: 'category',
		title: __( 'Post Categories 2' ),
		description: __( "Display a post's categories." ),
		isDefault: true,
		attributes: { term: 'category' },
		isActive: ( blockAttributes ) => blockAttributes.term === 'category',
	},

	{
		name: 'post_tag',
		title: __( 'Post Tags 2' ),
		description: __( "Display a post's tags." ),
		attributes: { term: 'post_tag' },
		isActive: ( blockAttributes ) => blockAttributes.term === 'post_tag',
	},
	{
		name: 'custom_tax',
		title: __( 'custom tax' ),
		description: __( "Display a post's custom tarx terms." ),
		attributes: { term: 'custom_tax' },
		isActive: ( blockAttributes ) => blockAttributes.term === 'custom_tax',
	},
];

export default variations;
