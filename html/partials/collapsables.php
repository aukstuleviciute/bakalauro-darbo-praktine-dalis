<style>
    .collapsable {
        overflow: hidden;
        transition: max-height 0.2s ease-out;
    }
    
    .collapse-trigger.fa-chevron-down {
        transition: transform 0.2s ease-out;
    }
    
    .collapse-trigger.fa-chevron-down.shows {
        transform: rotate(180deg);
    }
</style>

<script>
    function instrumentCollapsables(root) {
        const triggers = root.querySelectorAll('.collapse-trigger')
        triggers.forEach(setupButton)

        function setupButton(button) {
            const targetsSelector = button.getAttribute('target')
            const targets = root.querySelectorAll(targetsSelector)
            
            addCollapsableClass(targets)
            if (!button.classList.contains('shows')) {
                hideAll(targets)
            }
            
            button.addEventListener('click', () => {
                button.classList.toggle('shows')
                if (button.classList.contains('shows')) {
                    showAll(targets)
                } else {
                    hideAll(targets)
                }
            })
        }

        function showAll(elements) {
            elements.forEach(ele => ele.style.maxHeight = ele.scrollHeight + 'px')
        }
        
        function hideAll(elements) {
            elements.forEach(ele => {
                if (!ele.style.maxHeight) {
                    ele.style.maxHeight = ele.scrollHeight + 'px'
                    setTimeout(() => ele.style.maxHeight = '0px', 0)
                } else {
                    ele.style.maxHeight = '0px'
                }
            })
        }
        
        function addCollapsableClass(elements) {
            elements.forEach(ele => ele.classList.add('collapsable'))
        }
    }
</script>