import React, {ReactNode} from 'react';
import styled from 'styled-components';
import {Overlay} from './Overlay/Overlay';
import {Item, ItemLabel} from './Item/Item';
import {ItemCollection} from './ItemCollection/ItemCollection';
import {getColor} from '../../theme';

const DropdownContainer = styled.div`
  position: relative;
  display: inline-block;
`;

type DropdownProps = {
  /**
   * The content of the Dropdown
   */
  children?: ReactNode;
};

const Header = styled.div`
  box-sizing: border-box;
  border-bottom: 1px solid ${getColor('brand', 100)};
  height: 44px;
  line-height: 44px;
  margin: 0 20px 10px 20px;
`;

const Content = styled.div``;

const Title = styled.div`
  font-size: 11px;
  text-transform: uppercase;
  color: ${getColor('brand', 100)};
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
`;

/**
 * The dropdown shows a list of options that can be used to select, filter or sort content.
 */
const Dropdown = ({children, ...rest}: DropdownProps) => {
  return <DropdownContainer {...rest}>{children}</DropdownContainer>;
};

Header.displayName = 'Dropdown.Header';
Title.displayName = 'Dropdown.Title';
ItemCollection.displayName = 'Dropdown.ItemCollection';
Content.displayName = 'Dropdown.Content';

Dropdown.Overlay = Overlay;
Dropdown.Header = Header;
Dropdown.Item = Item;
Dropdown.ItemLabel = ItemLabel;
Dropdown.Title = Title;
Dropdown.ItemCollection = ItemCollection;
Dropdown.Content = Content;

export {Dropdown};
