<template id="slider-checkbox-section-template">
    <div class="root filter">
        <div>
            <label class="title"></label>
            <i class="fas fa-chevron-down collapse-trigger shows" target=".content" style="float: right;"></i>
            <hr>
        </div>
        <div class="content">
            <div id="duration-range" class="collapse in show">
                <div>
                    <button class="btn btn-primary clear">VALYTI</button>
                </div>
                <br>
                <p>
                  <input class="range-text" type="text" readonly style="border:0; color:#007bff;">
                </p>
                <div class="slider-range"></div>
                <br>
            </div>
        </div>
    </div>
</template>

<style>
    .slider-range {
        margin: 0 1em;
    }
</style>

<script>
    function RenderSliderFilterFromTemplate({ root, slug, title, scale, range, formatValue, update }) {
        range = (typeof range === 'function' ? range() : range)
        scale = scale || 1

        const minValue = Math.floor(range[0] / scale)
        const maxValue = Math.ceil(range[1] / scale)

        renderFromTemplate('template#slider-checkbox-section-template', root, [0], root => {
            instrumentCollapsables(root.querySelector('.root'))
            const clearButton = root.querySelector('.clear')
            const clearAllButton = document.querySelector('#clear-all')

            const titleEle = root.querySelector('.title')
            const rangeTextEle = root.querySelector('.range-text')
            const sliderEle = $(root.querySelector('.slider-range'))

            titleEle.textContent = title

            clearButton.addEventListener('click', reset)
            clearAllButton.addEventListener('click', reset)

            setTimeout(() => {
                sliderEle.slider({
                    range: true,
                    min: minValue,
                    max: maxValue,
                    values: [ minValue, maxValue ],
                    slide: (event, ui) => onChange(ui.values[0], ui.values[1]),
                })

                reset()
            }, 0)

            function reset() {
                sliderEle.slider('values', [ minValue, maxValue ])
                onChange(minValue, maxValue)
            }

            function onChange(newMinValue, newMaxValue) {
                rangeTextEle.value = formatValue(newMinValue * scale) + ' - ' + formatValue(newMaxValue * scale)
                
                const hasDefaultValues = newMinValue === minValue && newMaxValue === maxValue
                clearButton.classList.toggle('hidden', hasDefaultValues)
                clearAllButton.classList.toggle(`hidden-by-${slug}`, hasDefaultValues)

                update(newMinValue * scale, newMaxValue * scale)
            }
        })
    }
</script>