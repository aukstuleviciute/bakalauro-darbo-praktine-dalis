<?php
    $multiCityEntries = array();
    while (isset($_GET['arrival_'.count($multiCityEntries)])) {
        $entry = array(
            'arrival' => $_GET['arrival_'.count($multiCityEntries)],
            'departure' => $_GET['departure_'.count($multiCityEntries)],
            'departureDate' => $_GET['departureDate_'.count($multiCityEntries)],
        );
        array_push($multiCityEntries, $entry);
    }
    if (empty($multiCityEntries)) {
        $multiCityEntries = null;
    }
?>


    <div class="site-content">
        <div>
            <div>
                
                <div>
                    <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-open="roundtrip">Į abi puses</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-open="oneway">Į vieną pusę</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-open="multicity">Kelių miestų</a>
                    </li>
                    </ul>
                </div>

                <div>
                    <div id="roundtrip" class="tabcontent">
                        <form id="form" action="search-results.php" class="value-swapper-root remember-values <?=(isset($_GET['type']) ? 'filled' : '')?>" id="roundtrip-search-form">
                            <input type="hidden" name="type" value="roundtrip"/>
                            
                            <div class="inputs-line">
                                <div style="width: 17em;" class="location-autocomplete-support">
                                    <label class="departureLocation label">Išvykimo vieta</label>
                                    <input autocomplete="off" name="departure" type="search" class="departureLocation autocomplete-input shared-value-departure swap-value-a" id="departureLocation" placeholder="Šalis, miestas arba oro uostas"  required value="<?=$_GET['departure']?>"/>
                                    <div class="overlay autocomplete-results" id="departure-overlay"></div>
                                </div>    
                                <div>
                                    <span class="fas fa-exchange-alt switch-button label swap-trigger"></span>
                                </div>
                                <div style="width: 17em" class="location-autocomplete-support">
                                    <label class="arrivalLocation label">Atvykimo vieta</label>
                                    <input autocomplete="off" name="arrival" type="search" class="arrivalLocation autocomplete-input shared-value-arrival swap-value-b" id="arrivalLocation" placeholder="Šalis, miestas arba oro uostas" required value="<?=$_GET['arrival']?>"/>
                                    <div class="overlay autocomplete-results" id="arrival-overlay"></div>
                                </div>
                                <div style="width: 12em">
                                    <label class="departureDate label">Išvykimo data</label>
                                    <input name="departureDate" type="date" class="departureDate shared-value-date" id="departureDate" min="<?php echo date('Y-m-d');?>" max="2022-12-13" required value="<?=$_GET['departureDate']?>"/>
                                </div>
                                <div style="width: 12em">
                                    <label class="arrivalDate label">Grįžimo data</label>
                                    <input name="arrivalDate" type="date" class="arrivalDate"min="<?php echo date('Y-m-d');?>" max="2022-12-13" required value="<?=$_GET['arrivalDate']?>"/>
                                    <div class="message" style="position: absolute;">Iš pradžių pasirinkite išvykimo datą</div>
                                </div>
                                <div id="travellers-input">
                                    <label class="label" for="travellers">Keleiviai</label>
                                    <input type="text" id="travellersInput" class="travellers" readonly/>
                                    <div class="overlay" id="travellers-overlay">
                                        <label style="width: 10em">Suaugusieji (16+)</label>
                                        <input name="numAdults" type="number" id="numAdults" name="quantity" min="1" max="10" value="1">
                                        <br/>
                                        <label style="width: 10em">Vaikai (0-16)</label>
                                        <input name="numChildren" type="number" id="numChildren" name="quantity" style="margin-bottom: 15px;" min="0" max="10" value="0">
                                    </div>
                                </div>
                            </div>
                            <div class="confirmation-line">
                                <button type="submit" class="btn btn-primary btn-search">IEŠKOTI</button>
                            </div>
                        </form>
                    </div>

                    <div id="oneway" class="tabcontent">
                        <form action="search-results.php" class="value-swapper-root remember-values <?=(isset($_GET['type']) ? 'filled' : '')?>" id="oneway-search-form">
                            <div class="inputs-line">
                                <div style="width: 17em;" class="location-autocomplete-support">
                                    <label class="departureLocation label">Išvykimo vieta</label>
                                    <input autocomplete="off" name="departure" type="search" class="departureLocation autocomplete-input shared-value-departure swap-value-a" id="departureLocation" placeholder="Šalis, miestas arba oro uostas" required value="<?=$_GET['departure']?>">
                                    <div class="overlay autocomplete-results" id="departure-overlay"></div>
                                </div>
                                <input type="hidden" name="type" value="oneway"/>
                                <div>
                                    <span class="fas fa-exchange-alt switch-button label swap-trigger"></span>
                                </div>
                                <div style="width: 17em" class="location-autocomplete-support">
                                    <label class="arrivalLocation label">Atvykimo vieta</label>
                                    <input autocomplete="off" name="arrival" type="search" class="arrivalLocation autocomplete-input shared-value-arrival swap-value-b" id="arrivalLocation" placeholder="Šalis, miestas arba oro uostas" required value="<?=$_GET['arrival']?>">
                                    <div class="overlay autocomplete-results" id="arrival-overlay"></div>
                                </div>
                                <div style="width: 24.25em">
                                    <label class="departureDate label">Išvykimo data</label>
                                    <input name="departureDate" type="date" class="departureDate shared-value-date" id="departureDate" min="<?php echo date('Y-m-d');?>" max="2022-12-13" required value="<?=$_GET['departureDate']?>"/>
                                </div>
                                <div id="travellers-input">
                                    <label class="label" for="travellers">Keleiviai</label>
                                    <input class="travellers" type="text" id="travellersInput" readonly/>
                                    <div class="overlay" id="travellers-overlay">
                                        <label style="width: 10em">Suaugusieji (16+)</label>
                                        <input name="numAdults" type="number" id="numAdults" name="quantity" min="1" max="10" value="1">
                                        <br/>
                                        <label style="width: 10em">Vaikai (0-16)</label>
                                        <input name="numChildren" type="number" id="numChildren" name="quantity" style="margin-bottom: 15px;" min="0" max="10" value="0">
                                    </div>
                                </div>
                            </div>
                            <div class="confirmation-line">
                                <button type="submit" class="btn btn-primary btn-search">IEŠKOTI</button>
                            </div>
                        </form>
                    </div>

                    <div id="multicity" class="tabcontent">
                         <form action="search-results.php" id="multicity-search-form" class="<?=(isset($_GET['type']) ? 'filled' : '')?>">
                            <div class="inputs-line">
                                
                                <div id="multi-city-inputs"></div>
                                
                                <!--Template-->
                                <template id="multi-city-template">
                                    <div class="inputs-line">
                                        <div style="width: 17em;" class="location-autocomplete-support" id="multi-city-departure">
                                            <label class="departureLocation label">Išvykimo vieta</label>
                                            <input autocomplete="off" name="departure" id="departure" class="departureLocation autocomplete-input swap-value-a" placeholder="Šalis, miestas arba oro uostas" required>
                                            <div class="overlay autocomplete-results" id="departure-overlay"></div>
                                        </div>
                                        <div>
                                            <span class="fas fa-exchange-alt switch-button label swap-trigger"></span>
                                        </div>
                                        <div style="width: 17em" class="location-autocomplete-support" id="multi-city-arrival">
                                            <label class="arrivalLocation label">Atvykimo vieta</label>
                                            <input autocomplete="off" name="arrival" id="arrival" class="arrivalLocation autocomplete-input swap-value-b" placeholder="Šalis, miestas arba oro uostas" required>
                                            <div class="overlay autocomplete-results" id="arrival-overlay"></div>
                                        </div>
                                        <div style="width: 27em">
                                            <label class="departureDate label">Išvykimo data</label>
                                            <input name="departureDate" id="departureDate" class="departurDate" type="date" required min="<?php echo date('Y-m-d');?>" max="2022-12-13"/>
                                        </div>
                                        <div>
                                            <i id="btn-remove" class="fas fa-times btn-remove label"></i>
                                        </div>
                                    </div>
                                </template>

                            </div>
                             
                            <input type="hidden" name="type" value="multicity"/>
                            <div class="confirmation-line">
                                <button id="add-destination-button" class="btn btn-primary btn-add"><i class="fas fa-plus-circle"></i>PRIDĖTI TIKSLĄ</button>
                            </div>
                             
                            <div class="inputs-line">
                                <div id="travellers-input">
                                    <label class="label" for="travellers">Keleiviai</label>
                                    <input type="text" id="travellersInput" style="width:17em" readonly/>
                                    <div class="overlay" id="travellers-overlay">
                                        <label style="width: 10em">Suaugusieji (16+)</label>
                                        <input name="numAdults" type="number" id="numAdults" name="quantity" min="1" max="10" value="1">
                                        <br/>
                                        <label style="width: 10em">Vaikai (0-16)</label>
                                        <input name="numChildren" type="number" id="numChildren" name="quantity" style="margin-bottom: 15px;" min="0" max="10" value="0">
                                    </div>
                                </div>
                            <div class="confirmation-line">
                                <button type="submit" class="btn btn-primary btn-multi-search">IEŠKOTI</button>
                            </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <template id="auto-complete-result-template">
        <div class="auto-complete-item">
            <i class="fas" style="display: inline-block;"></i>
            <div style="display: inline-block;" id="title"></div>
        </div>
    </template>

    <script>
    (function() {
        window.instrumentValueSwapper = instrument;
        [...document.querySelectorAll('.value-swapper-root')].forEach(instrument)
        
        function instrument(root) {
            const eleA = root.querySelector('.swap-value-a')
            const eleB = root.querySelector('.swap-value-b')
            const button = root.querySelector('.swap-trigger')
            
            button.addEventListener('click', () => {
                const tmp = eleA.value
                eleA.value = eleB.value
                eleA.dispatchEvent(new CustomEvent('change'))
                eleB.value = tmp
                eleB.dispatchEvent(new CustomEvent('change'))
            })
            
            button.addEventListener('click', addTemporaryClass('clicked', 200))
        }
        
        function addTemporaryClass(className, duration) {
            return e => {
                e.target.classList.add(className)
                setTimeout(() => e.target.classList.remove(className), duration)
            }
        }
    })();

    (function() {
        const cityOptions = allCities().map(name => ({ name, type: 'city' })).map(it => ({ [it.name]: it })).reduce((acc, it) => ({ ...acc, ...it }), {})
        const airportOptions = allAirports().map(name => ({ name, type: 'airport' })).map(it => ({ [it.name]: it })).reduce((acc, it) => ({ ...acc, ...it }), {})
        const options = { ...cityOptions, ...airportOptions }
        
        window.instrumentAutocompleteSupport = instrumentElements 
        document.querySelectorAll('.location-autocomplete-support').forEach(instrumentElements)
        
        function instrumentElements(root) {
            const input = root.querySelector('.autocomplete-input')
            const resultsContainer = root.querySelector('.autocomplete-results')
            
            const overlay = Overlay(resultsContainer)
            const autocomplete = LocationAutoComplete(resultsContainer, options, (ele, item) => {
                const titleEle = ele.getElementById('title')
                
                const image = ele.querySelector('.fas')
                
                if (item.type === 'city') {
                    image.classList.add('fa-city')
                    
                } else if (item.type === 'airport') {
                    image.classList.add('fa-plane')
                }
                
                titleEle.textContent = item.name
                titleEle.addEventListener('click', () => {
                    input.value = item.name
                    input.dispatchEvent(new Event('change'))
                    overlay.hide()
                })
            })
                
            input.addEventListener('input', () => {
                overlay.show()
                autocomplete.query(input.value)
            })
            
            input.addEventListener('change', () => {
                if (!options[input.value]) {
                    input.setCustomValidity('Vietos rasti nepavyko')
                } else {
                    input.setCustomValidity('')
                }
            })
        }

    })();

    (function() {
        const links = [...document.getElementsByClassName('nav-link')];
        const contents = [...document.getElementsByClassName('tabcontent')];
        
        [...document.querySelectorAll('.tabcontent')].forEach(tab => {
            tab.querySelector('form').addEventListener('submit', () => localStorage.setItem('last-submitted-tab', tab.id))
        })

        activate(localStorage.getItem('last-submitted-tab') || 'roundtrip')

        links.forEach(e => {
            const contentId = e.getAttribute('data-open')
            e.addEventListener('click', () => activate(contentId))
        })

        function activate(id) {
            links.forEach(e => {
            const linkId = e.getAttribute('data-open')
            if (linkId === id) {
                e.classList.add('active')
            } else {
                e.classList.remove('active')
            }
            })

            contents.forEach(e => {
            const contentId = e.getAttribute('id')
            if (contentId === id) {
                e.classList.add('active')
            } else {
                e.classList.remove('active')
            }
            })
        }
    })();
   
    (function() {
        const overlays = document.querySelectorAll('#travellers-overlay')
        const inputs = document.querySelectorAll('#travellersInput')
        
        inputs.forEach(e => e.addEventListener('click', withoutPropagation(showOverlay)))
        overlays.forEach(e => e.addEventListener('click', withoutPropagation(showOverlay)))
        window.addEventListener('click', hideOverlay)
        
        function withoutPropagation(next) {
            return e => {
                e.stopPropagation()
                next()
            }
        }
        
        function showOverlay() {
            overlays.forEach(e => e.classList.add('visible'))
        }
        
        function hideOverlay() {
            overlays.forEach(e => e.classList.remove('visible'))
        }
    })();
        
    (function() {
        const totalNums = document.querySelectorAll('#travellersInput')
        const numAdults = document.querySelectorAll('#numAdults')
        const numChildren = document.querySelectorAll('#numChildren')
        
        let currentAdults = -1
        let currentChildren = -1
        
        setAdults(1)
        setChildren(0)
        
        setAdults(<?=$_GET['numAdults'] ?? '1'?>)
        setChildren(<?=$_GET['numChildren'] ?? '0'?>)
        
        numAdults.forEach(e => e.addEventListener('change', updateFromInput(setAdults)))
        numChildren.forEach(e => e.addEventListener('change', updateFromInput(setChildren)))
        
        function updateFromInput(setValue) {
            return e => setValue(parseInt(e.target.value))
        }
        
        function setAdults(amount) {
            if (currentAdults === amount) return
            numAdults.forEach(e => e.value = amount)
            currentAdults = amount
            updateTotal()
        }
        
        function setChildren(amount) {
            if (currentChildren === amount) return
            numChildren.forEach(e => e.value = amount)
            currentChildren = amount
            updateTotal()
        }
        
        function updateTotal() {
            totalNums.forEach(e => e.value = `${currentAdults + currentChildren}`)
        }
    })();
        
    (function() {
        const itemsFromServer = <?=json_encode($multiCityEntries)?>;
        const itemsFromStorage = restoreFormValues()
        const defaultValues = [ {}, {} ]
        const items = (itemsFromServer || itemsFromStorage || defaultValues)
    
        if (itemsFromServer) saveFormValues(itemsFromServer)
        
        refresh()
        
        document.getElementById('add-destination-button').addEventListener('click', e => {
            e.target.blur()
            e.preventDefault()
            const counter = items.length
            items.push({})
            refresh()
        })
        
        function refresh() {
            document.getElementById("add-destination-button").disabled = items.length >= 4
            
            renderItems('multi-city-template', 'multi-city-inputs', items, (ele, item) => {
                const index = items.indexOf(item)
                const counter = items.length
                
                window.instrumentAutocompleteSupport(ele.getElementById('multi-city-departure'))
                window.instrumentAutocompleteSupport(ele.getElementById('multi-city-arrival'))
                
                window.instrumentValueSwapper(ele)

                if(counter > 2) {
                    ele.getElementById("btn-remove").addEventListener('click', () => {
                        items.splice(index, 1)
                        refresh()
                    })
                }
                else {
                      ele.getElementById("btn-remove").classList.add('disabled') 
                }
                
                const departureInput = ele.getElementById('departure')
                const arrivalInput = ele.getElementById('arrival')
                const departureDateInput = ele.getElementById('departureDate')
                
                departureInput.addEventListener('change', () => {
                    item.departure = departureInput.value
                })
                
                arrivalInput.addEventListener('change', () => {
                    item.arrival = arrivalInput.value
                })
                
                departureDateInput.addEventListener('change', () => {
                    item.departureDate = departureDateInput.value
                })
                
                departureInput.name = `${departureInput.name}_${index}`
                departureInput.value = item.departure || ''
                
                arrivalInput.name = `${arrivalInput.name}_${index}`
                arrivalInput.value = item.arrival || ''
                
                departureDateInput.name = `${departureDateInput.name}_${index}`
                departureDateInput.value = item.departureDate || ''
            })
        }
        
        function restoreFormValues() {
            const entry = localStorage.getItem('last-multi-city-values')
            return entry && JSON.parse(entry)
        }
        
        function saveFormValues(values) {
            localStorage.removeItem('remember-form-values')
            localStorage.setItem('last-multi-city-values', JSON.stringify(values))
        }
    })();
        
        
    (function() {
        instrument('input.shared-value-departure')
        instrument('input.shared-value-arrival')
        instrument('input.shared-value-date')
        
        function instrument(selectorQuery) {
            const inputs = [...document.querySelectorAll(selectorQuery)]
            inputs.forEach(e => e.addEventListener('change', e => setAllValues(e.target.value)))
            
            function setAllValues(newValue) {
                inputs.filter(it => it.value !== newValue).forEach(it => it.value = newValue)
            }
        }
    })();
        
    
        
    
        
    function renderItems(templateId, containerId, items, render) {
        const template = document.getElementById(templateId)
        const container = document.getElementById(containerId)

        container.innerHTML = ''
        items.forEach(item => {
            const child = template.content.cloneNode(true)
            render(child, item)
            container.appendChild(child)
        })
    }
        
    function Overlay(elementQuery) {
        const elements = (typeof elementQuery === 'string' ? document.querySelectorAll(elementQuery) : [ elementQuery ])
        
        window.addEventListener('click', () => hide())
        elements.forEach(it => it.addEventListener('click', e => e.stopPropagation()))
        
        return { show, hide }
        
        function hide() {
            elements.forEach(it => it.classList.remove('visible'))
        }
        
        function show() {
            elements.forEach(it => it.classList.add('visible'))
        }
    }
        
    function LocationAutoComplete(resultsContainerQuery, options, renderItem) {
        options = withLowerCaseKeys(options)
        
        const resultsContainer = (typeof resultsContainerQuery === 'string' ? document.querySelector(resultsContainerQuery) : resultsContainerQuery)
        const resultTemplate = document.getElementById('auto-complete-result-template')
        
        return { query }
        
        function query(str) {
            str = str.toLowerCase()
            const matchingKeys = Object.keys(options).filter(k => k.includes(str))
            renderResults(matchingKeys.slice(0, 5))
        }

        function renderResults(keys) {
            resultsContainer.innerHTML = ''
            keys.map(k => options[k]).forEach(item => {
                const child = resultTemplate.content.cloneNode(true)
                renderItem(child, item)
                resultsContainer.appendChild(child)
            })
        }
        
        function withLowerCaseKeys(obj) {
            return Object.keys(obj).map(k => ({ [k.toLowerCase()]: obj[k] })).reduce((acc, it) => ({ ...acc, ...it }), {})
        }
    }
        
    function allCities() {
        const valuesFromDataset = window.dataset.flights.map(it => [ it.departureCity, it.arrivalCity ]).reduce((acc, it) => [ ...acc, ...it ], []).filter(it => it)
        return [ ...new Set(valuesFromDataset) ]
    }
        
    function allAirports() {
        const valuesFromDataset = window.dataset.flights.map(it => [ it.departureAirport, it.arrivalAirport ]).reduce((acc, it) => [ ...acc, ...it ], []).filter(it => it)
        return [ ...new Set(valuesFromDataset) ]
    }    
</script>

<script>
(function() {
    const arrivalDate = document.querySelector('#roundtrip form input[name=arrivalDate]')
    const departureDate = document.querySelector('#roundtrip form input[name=departureDate]')
    
    arrivalDate.addEventListener('change', check)
    departureDate.addEventListener('change', updateDepartureMin)
    departureDate.addEventListener('change', check)
    
    function check() {
        const errorMessage = 'Grįžimo data turi būti ne anksčiau išvykimo datos'
        if (arrivalDate.value < departureDate.value) {
            arrivalDate.setCustomValidity(errorMessage)
        } else {
            arrivalDate.setCustomValidity('')
        }
    }
    
    arrivalDate.addEventListener('focus', () => {
        if(departureDate.value == '')
            {
                arrivalDate.blur()
                document.querySelector('.message').classList.add('visible')
            }
        else {
            document.querySelector('.message').classList.remove('visible')
        }
    })
    
    function updateDepartureMin() {
        arrivalDate.min = departureDate.value
    }
})();
</script>

<script>
    (function() {
        const storageKey = 'remember-form-values'
        
        const entryFromStorage = localStorage.getItem(storageKey)
        entryFromStorage && restoreForm(JSON.parse(entryFromStorage))
        
        const forms = document.querySelectorAll('form.remember-values')
        forms.forEach(root => {
            root.addEventListener('submit', e => {
                const formId = e.target.id
                const values = inputValues(e.target)
                localStorage.removeItem('last-multi-city-values')
                localStorage.setItem(storageKey, JSON.stringify({ formId, values, }))
            })
        })
        
        function inputValues(form) {
            const inputs = [...form.querySelectorAll('input')].filter(it => it.name)
            return inputs.map(it => ({ [it.name]: it.value })).reduce((acc, it) => ({ ...acc, ...it }), {})
        }
        
        function restoreForm({ formId, values }) {
            const form = document.querySelector(`form#${formId}`)
            if (form.classList.contains('filled')) return
            form.classList.add('filled')
            Object.entries(values).forEach(([ name, value ]) => {
                const input = form.querySelector(`input[name=${name}]`)
                input.value = value
                input.dispatchEvent(new CustomEvent('change'))
            })
        }
    })();
</script>