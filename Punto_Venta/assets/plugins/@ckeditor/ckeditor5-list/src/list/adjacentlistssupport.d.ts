/**
 * @license Copyright (c) 2003-2024, CKSource Holding sp. z o.o. All rights reserved.
 * For licensing, see LICENSE.md or https://ckeditor.com/legal/ckeditor-oss-license
 */
import { Plugin } from 'ckeditor5/src/core.js';
export default class AdjacentListsSupport extends Plugin {
    /**
     * @inheritDoc
     */
    static get pluginName(): "AdjacentListsSupport";
    /**
     * @inheritDoc
     */
    init(): void;
}