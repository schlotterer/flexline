# Conditional component CSS

The initial split covers horizontal scrolling and sliders only. Buttons, colors,
backgrounds, forms, navigation, typography and other utilities remain available.
No selectors are purged. The complete `app.css` is still the editor stylesheet
and the fallback frontend bundle.

## Activation and rollback

`flexline_conditional_component_styles` defaults true only when WordPress reports
`local` or `development`. It defaults false in production. The option of the
same name can override the default. Returning false from the filter restores the
complete bundle immediately; clear the page cache after changing it. No database
migration is involved.

Optimization requires the exact native WordPress template-canvas.php, observed
pre-head rendered blocks and all built split assets. Otherwise full app.css loads.
The native canvas renders the full block template before wp_head. The collector
therefore observes nested template parts, patterns, Query Loops and dynamic output,
not just blocks in post_content. Mobile-only horizontal-scroll classes count even
on desktop. Required sheets are enqueued in the head, not on interaction.

For asynchronous components or markup injected after template rendering, declare
requirements before wp_enqueue_scripts, for example:

```php
add_filter( 'flexline_required_component_styles', function ( $required ) {
    $required['horizontal-scroll'] = true;
    $required['slider'] = true;
    return $required;
} );
```

Alternatively disable optimization for that request. Unknown keys or a malformed
requirements value cause full fallback. This first release does not attempt to
infer arbitrary JavaScript-injected markup. Iframes make their own request and
receive their own asset decision. Admin/editor loading remains unchanged.

## Sources and cascade

app.scss composes app-conditional.scss, horizontal scrolling, slider and the tiny
component-tail.scss in original order. The frontend reduced base and selected
component sheets use the same mixins. Tail styles (Plethora overrides and toggle
states) are included inline after the final selected sheet, preserving cascade
without a tiny extra request. Nonempty customize.css depends on those handles so
site overrides remain last. Both complete and split assets must ship together.

## Verification

- `npm run build` with Node 24.14.0: passed.
- `npm run ci-lint-style`: passed.
- `vendor/bin/phpcs inc/component-styles.php inc/scripts.php`: passed.
- `php tests/component-styles-contract.php`: 8 focused checks passed.
- `node tests/component-css-equivalence.cjs`: all 1,291 compiled declarations,
  including selectors, values, importance and ordering, match the complete bundle.
- PHP syntax and git diff whitespace checks passed.
- Local homepage HTTP 200: reduced base and slider CSS appear in head, horizontal
  scroll CSS omitted, global toggle/button tail retained.

Built source sizes: complete app.css 111,487 bytes; reduced base 66,782;
horizontal scroll 36,053; slider 7,337; always-present inline tail 1,318.
These are uncompressed sizes, not network savings. Existing full app.css output
is unchanged. When both optional components are needed, all CSS remains available.

Local Charlie browser checks verified reduced base CSS on Home and About,
desktop scrolling on Testimonials, and touch scrolling on Resources. Temporary
Charlie responses verified slider controls with mouse and keyboard, both
components on the same page, and full CSS fallback. Hosted visual and health
verification is still pending. To test the split on a hosted subsite, enable
`flexline_conditional_component_styles` for that subsite and clear its page
cache before checking requests in the browser.
