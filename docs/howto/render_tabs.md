# How-to: render tabs in the UI

Using tabs in a graphical user interface is a very common pattern. Several pages
in the Hybrid Platform UI application have tabs so this pattern can easily be
reused in any custom page.

## Basic tabs

### Markup

Here is a markup example to render 3 tabs:

```html
<ez-server-side-content><!-- or any custom element extending ez-server-side-content -->
    <div class="ez-tabs">
        <ul class="ez-tabs-list">
            <li class="ez-tabs-label is-tab-selected"><a href="#tab1">Tab 1</a></li>
            <li class="ez-tabs-label"><a href="#tab2">Tab 2</a></li>
            <li class="ez-tabs-label"><a href="#tab3">Tab 3</a></li>
        </ul>
        <div class="ez-tabs-panels">
            <div class="ez-tabs-panel is-tab-selected" id="tab1">
                Tab 1 content
            </div>
            <div class="ez-tabs-panel" id="tab2">
                Tab 2 content
            </div>
            <div class="ez-tabs-panel" id="tab3">
                Tab 3 content
            </div>
        </div>
    </div>
</ez-server-side-content>

```

Constraints:

* To be recognized, the tabs markup must be inside a `ez-server-side-content`
  custom element or a custom element extending this one (`ez-content-view`, ...)
* Each tab consists of a *tab label* and a *tab panel*. A panel must have an
  `id` and the corresponding tab label must contain a link which
  `href` attribute value is that id.
* To initially select a tab, the class `is-tab-selected` must be set on both the
  label and panel HTML element.

### JavaScript API

When switching tab, the `ez:tabChange` custom event is dispatched from the
`ez-server-side-content` custom element. This event carries the tab label
element and the tab panel element that are going to be selected. It is is
configured [to
*bubble*](https://www.w3.org/TR/DOM-Level-2-Events/events.html#Events-flow-bubbling)
and to [be
*cancelable*](https://www.w3.org/TR/DOM-Level-2-Events/events.html#Events-flow-cancelation).

So it's possible to listen to `ez:tabChange` from the custom element dispatching
it or from any parent HTML element (and even from the document).

Example:

```js
document.addEventListener('ez:tabChange', function (e) {
    console.log('A new tab is about to be selected');
    console.log('Panel element', e.detail.panel);
    console.log('Label element', e.detail.label);

    if (whatEverReason) {
        console.log('I don\'t want this new panel to be selected');
        e.preventDefault();
    }
});
```

## Asynchronously loaded tabs

### Markup

### Local navigation

### JavaScript API
