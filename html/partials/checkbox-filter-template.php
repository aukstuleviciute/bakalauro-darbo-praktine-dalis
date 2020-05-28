<template id="checkbox-filter-template">
    <div class="root filter">
        <div>
            <label class="title"></label>
            <i class="fas fa-chevron-down collapse-trigger shows" target=".content" style="float: right;"></i>
            <hr>
        </div>
        <div class="content">
            <div>
                <div>
                    <button class="btn btn-primary clear">VALYTI</button>
                </div>
                <br>

                <div>
                    <input class="search" type="text" placeholder="Ieškoti">
                </div>

               <div class="empty-message" style="background-color: white; text-align: center;">Nėra rezultatų</div>
               <div style="background-color: white;" class="checkboxes"></div>
            </div>
        </div>
    </div>
</template>

<template id="checkbox-label-template">
    <div class="root">
        <input type="checkbox" class="checkbox-item" style="margin-left: 5px;">
        <label></label>
    </div>
</template>

<style>
    input.search {
        display: none;
    }
    
    input.search.enabled {
        display: block;
    }

    .search-not-match {
        display: none;
    }
    
    .empty-message {
        display: none;
    }
    
    .empty-message.visible {
        display: block;
    }
    
    .checkbox-item {
        width: auto;
        height: auto;
        display: inline;
    }
</style>

<script>
    function RenderCheckboxFilterFromTemplate({ root, slug, title, formatValue, values, update, enableSearch }) {
        values = (typeof values === 'function' ? values() : values)
        formatValue = formatValue || (it => it)
        
        let checked = []
        let query = ''
        
        renderFromTemplate('template#checkbox-filter-template', root, [0], root => {
            instrumentCollapsables(root.querySelector('.root'))
            const clearButton = root.querySelector('.clear')
            const clearAllButton = document.querySelector('#clear-all')
            
            const titleEle = root.querySelector('.title')
            const checkboxesContainer = root.querySelector('.checkboxes')
            const searchInput = root.querySelector('.search')
            const emptyMessageEle = root.querySelector('.empty-message')
            
            titleEle.textContent = title
            
            clearButton.addEventListener('click', reset)
            clearAllButton.addEventListener('click', reset)
        
            if (enableSearch) searchInput.classList.add('enabled')
            searchInput.addEventListener('input', () => {
                query = searchInput.value
                onChange()
            })
            
            reset()
            
            function renderItems() {
                const matchingItems = values.filter(v => v.toLowerCase().includes(query.toLowerCase()))
                
                if (!matchingItems.length) {
                    emptyMessageEle.classList.add('visible')
                } else {
                    emptyMessageEle.classList.remove('visible')
                }
                
                
                clearButton.classList.toggle('hidden', !checked.length)
                clearAllButton.classList.toggle(`hidden-by-${slug}`, !checked.length)
                
                renderFromTemplate('template#checkbox-label-template', checkboxesContainer, values, (ele, value) => {
                    const matchesSearch = matchingItems.includes(value)
                    
                    const checkbox = ele.querySelector('input[type=checkbox]')
                    const label = ele.querySelector('label')

                    checkbox.checked = checked.includes(value)
                    label.textContent = formatValue(value)

                    checkbox.addEventListener('change', () => {
                        checked = checked.filter(it => it !== value)
                        if (checkbox.checked) {
                            checked = [ ...checked, value ]
                        }
                        onChange()
                    })
                    
                    if (!matchesSearch) {
                        ele.querySelector('.root').classList.add('search-not-match')
                    }
                })
            }
            
            function reset() {
                checked = []
                onChange()
            }
            
            function onChange() {
                renderItems()
                update([ ...checked ])
            }
        })
    }
</script>