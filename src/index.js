/**
 * Internal dependencies
 */
import metadata from './block.json';
import edit from './edit';
import variations from './variations';
import {
	registerBlockType,
} from '@wordpress/blocks';
/**
 * WordPress dependencies
 */
import save from './save';
const { name } = metadata;
const settings = {
	variations,
	edit,
	save
};
export { metadata, name, settings };
registerBlockType( { name, ...metadata }, settings );