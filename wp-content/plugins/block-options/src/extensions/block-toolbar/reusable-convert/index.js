/**
 * Internal dependencies
 */
import ToolbarControls from './components/controls';

/**
 * WordPress Dependencies
 */
const { addFilter } = wp.hooks;
const { Fragment } = wp.element;
const { createHigherOrderComponent } = wp.compose;

const allowedBlocks = [ 'core/block' ];

/**
 * Override the default edit UI to include a new block toolbar control
 *
 * @param {Function} BlockEdit Original component.
 * @return {string} Wrapped component.
 */
const withControls = createHigherOrderComponent( ( BlockEdit ) => {
	return ( props ) => {
		return (
			<Fragment>
				{ props.isSelected && allowedBlocks.includes( props.name ) && <ToolbarControls { ...{ ...props } } /> }
				<BlockEdit { ...props } />
			</Fragment>
		);
	};
}, 'withControls' );

addFilter(
	'editor.BlockEdit',
	'editorskit/reusable-block-convert',
	withControls,
);
