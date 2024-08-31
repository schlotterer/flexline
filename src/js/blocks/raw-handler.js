wp.domReady(() => {
    const allowedPlainTextBlocks = [
        'core/paragraph',
        'core/heading',
        'core/quote',
        'core/list',
        'core/preformatted'
    ];

    wp.data.subscribe(() => {
        const { isTyping, getSelectedBlock } = wp.data.select('core/block-editor');

        if (!isTyping()) {
            const block = getSelectedBlock();
            if (block && allowedPlainTextBlocks.includes(block.name)) {
                const blockElement = document.querySelector(`[data-block="${block.clientId}"]`);

                if (blockElement) {
                    // Remove any existing paste listener first to avoid duplicates
                    blockElement.removeEventListener('paste', handlePaste);

                    // Add the paste event listener
                    blockElement.addEventListener('paste', handlePaste, { once: true });
                }
            }
        }
    });

    function handlePaste(event) {
        const clipboardData = event.clipboardData.getData('text');

        // Check if the pasted content contains a shortcode
        if (/\[[^\]]+\]/.test(clipboardData)) {
            event.preventDefault();

            const selection = window.getSelection();
            if (selection.rangeCount > 0) {
                const range = selection.getRangeAt(0);
                range.deleteContents();
                range.insertNode(document.createTextNode(clipboardData));

                // Trigger the block content update
                const blockId = event.target.closest('[data-block]').dataset.block;
                const blockElement = document.querySelector(`[data-block="${blockId}"]`);

                wp.data.dispatch('core/block-editor').updateBlockAttributes(blockId, {
                    content: blockElement.innerText
                });
            }
        }
    }
});
