<?php require('slider-filter-template.php') ?>  
<?php require('checkbox-filter-template.php') ?> 

<div class="site-content no-results-message">
    <h2>Nepavyko rasti paieškos rezultatų. Bandykite atlikti paiešką iš naujo.</h2>
</div>

<div class="site-content results-screen">
        
        <div class="results-container">
            
            <div class="columns filter-column" style="width: 25%;" id="filters-column">
                <div>
                    <button class="btn btn-primary btn-alert open-modal" open-modal-selector="#price-alert-modal"><i class="fas fa-bell" style="margin-right: 7px;"></i>KAINŲ PRENUMERATA</button>
                    <div id="price-alert-modal" class="modal">
                        <div class="modal-content">
                            <div>  
                                <span class="close close-modal" close-modal-selector="#price-alert-modal"><i class="fas fa-times"></i></span>
                            </div>
                            <div style="text-align: center;">
                                <form>
                                    <div class="subscription-main-text">Norite sužinoti ieškomo skrydžio kainų pokyčius?</div>
                                    <div class="subscription-text">Užsiprenumeruokite!</div>
                                    <input type="email" placeholder="El. pašto adresas" required>
                                    <button type="submit" class="btn btn-primary" style="margin-top: 20px; margin-bottom: 20px;">UŽSIPRENUMERUOTI</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div id="price-alert-modal-success" class="modal" close-modal-selector="#price-alert-modal-success">
                        <div class="modal-content">
                            <div style="text-align: center;">
                                <form>
                                    <i style="font-size: 50px; color: #10A968"class="far fa-check-circle"></i>
                                    <div class="subscription-main-text">Kainų pokyčiai sėkmingai užprenumeruoti</div>
                                    <div>Kainų pokyčių prenumeratos galite atsisakyti</div>
                                    <div style="margin-bottom: 15px;">spustelėję ant nuorodos el. laiške</div>
                                    <button class="btn btn-primary">SUPRATAU</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="overflow: auto;">
                    <b class="title-filter" style="float: left; margin: 0;">Filtrai</b>
                    <button class="btn btn-primary clear-all" id="clear-all">VALYTI VISKĄ</button>
                    <!--<span style="float: right;" id="clear-all">Valyti viską</span>-->
                </div>
                <hr>
                <br>
                
                <div class="filter stops" id="stops-filter"></div>
                
                <div class="filter" id="price-filter"></div>
                
                <div class="filter" id="airlines-filter"></div>

                
                <div class="filter" id="airports-filter"></div>
                
                <div class="filter" id="duration-filter"></div>
            
                <div class="filter" id="layover-filter"></div>
                
            </div>   
            
            <div class="columns" style="width:75%;">
                <div class="stats-lane" style="text-align: center;">
                    <div style="overflow: auto; text-align: center; background-color: white; padding: 10px 10px 10px 10px;" class="first">
                        <div class="graph-title">Išvykimas</div>
                        
                        <div class="content">
                            <div style="writing-mode: tb-rl; transform: rotate(-180deg);">Kainos</div>
                            <div class="numbers">
                                <div class="top" style="display: inline-block;"><i class="fas fa-euro-sign"></i></div>
                                <div class="bottom" style="display: inline-block;"><i class="fas fa-euro-sign"></i></div>
                            </div>
                            <div class="legend" style="margin-right: 10px; margin-left: 20px;">
                                <div class="line"></div>
                            </div>
                            <div class="prices-stats"></div>
                        </div>
                        <div>Dienos</div>
                        
                    </div>
                    
                    <div style="overflow: auto; text-align: center; background-color: white; padding: 10px 10px 10px 10px;" class="second">
                        <div class="graph-title">Grįžimas</div>
                        
                        <div class="content">
                            <div style="writing-mode: tb-rl; transform: rotate(-180deg);">Kainos</div>
                            <div class="numbers">
                                <div class="top" style="display: inline-block;"><i class="fas fa-euro-sign"></i></div>
                                <div class="bottom" style="display: inline-block;"><i class="fas fa-euro-sign"></i></div>
                            </div>
                            <div class="legend" style="margin-right: 10px; margin-left: 20px;">
                                <div class="line"></div>
                            </div>
                            <div class="prices-stats"></div>
                        </div>
                        <div>Dienos</div>
                        
                    </div>
                </div>
                <div class="dropdown" style="text-align: right; margin-bottom: 10px;">
                    <form>
                        <label class="sort-title">Rikiuoti pagal</label>
                        <select class="sort" style="width: 12em;" id="sorting">
                            <option value="cheapest">Kaina (mažiausia)</option>
                            <option value="expensive">Kaina (didžiausia)</option>
                            <option value="shortest">Trukmė (trumpiausia)</option>
                            <option value="longest">Trukmė (ilgiausia)</option>
                        </select>
                    </form>
                </div>
                <div>
                    <div id="search-results-container"></div>
                </div>
            </div>
            
        </div>
        
    </div>

<template id="search-results-template">
    <div class="root">
        <div class="flight-container" style="background-color: white; padding-top: 15px; padding-bottom: 10px; border: 1px solid black;">
                        
            <table style="width: 100%;">
                <tr>
                    <td id="flight"></td>
                    <td style="width: 35%">
                        <div style="text-align: center;">
                            <div style="display: inline-block;">
                                <div id="price-sum" style="display: inline-block; font-weight: bold; font-size: 22px;"></div>
                                <div style="display: inline-block; font-size: 20px"><i class="fas fa-euro-sign"></i></div>
                                <div>
                                    <button class="btn btn-primary open-modal" open-modal-selector="#offer-modal">PERŽIŪRĖTI PASIŪLYMĄ</button>
                                     <div id="offer-modal" class="modal">
                                        <div class="modal-content">
                                            <div style="text-align: center;">
                                                <form>
                                                    <div class="spinner-border"></div>
                                                    <div class="offer-text">Jungiamasi prie bilietų pirkimo sistemos</div>
                                                    <button type="submit" class="btn btn-primary close-modal" close-modal-selector="#offer-modal" style="margin-top: 20px; margin-bottom: 20px;">ATŠAUKTI</button>
                                                </form>
                                            </div>
                                        </div>
                                      </div>
                                </div> 
                            </div>
                                 
                            <div style="text-align: center; display: inline-block; width: 20%">
                                <i class="fas fa-chevron-down collapse-trigger" target=".detailed-flight-info"></i>
                            </div>
                        </div>
                       
                    </td>
                    
                </tr>
            </table>
            <div class="detailed-flight-info"></div>
        </div>

    </div>
</template>

<template id="flight-info">

    <td style="text-align: center; width: 120px;">
        <img id="all-logo" height="20px;" style="vertical-align:middle">
        <div id="airline"></div>
    </td>
    <td style="text-align: right; width: 86px;">
        <div id="departure-time"></div>
        <div id="departure-airport"></div>
    </td>
    <td style="text-align: center; width: 186px;">
        <div id="duration"></div>
        <i class="fas fa-plane"></i>
        <br>
        <div id="stop-number"></div>
    </td>
    <td style="text-align: left; witdh: 66px;">
        <div id="arrival-time"></div>
        <div id="arrival-airport"></div>
    </td>
    <br>
</template>

<template id="flight-info-expanded">
    <div class="layover-container">
        <div>
            <div style="display: inline-block;">Persėdimo trukmė:</div>
            <div style="display: inline-block;" id="layover-duration"></div>
        </div>
    </div>
    <div id="flight" class="flight-container">
        <!--<h style="margin-top: 15px;"><i class="fas fa-times"></i></h>-->
        <div style="background-color: #E8FBFE; margin: 5px 15px 15px 15px;">
            <table style="width: 100%;">
                <tr>
                    <td style="text-align: center; width: 100px; font-size: 12px;">
                        <div id="date-expanded"></div>
                    </td>
                    
                    <td style="text-align: center; width: 100px;">
                        <img id="logo-id" height="20px;" style="vertical-align:middle">
                    </td>
                    <td style="text-align: left; width: 400px">
                        <div>
                            <div id="departure-time-expanded" style="display: inline-block; font-weight: bold;"></div>
                            <div style="display: inline-block;"> - </div>
                            <div id="arrival-time-expanded" style="display: inline-block; font-weight: bold;"></div>
                        </div>
                        <div>
                            <div id="departure-airport-expanded" style="display: inline-block;"></div>
                            <div style="display: inline-block;"> - </div>
                            <div id="arrival-airport-expanded" style="display: inline-block;"></div>
                        </div>
                    </td>
                    <td>
                        <div id="duration-expanded">Trukme</div>
                    </td>
                    <td>
                        <div style="display: inline-block; font-size: 14px; font-weight: bold;" id="ticket-price-expanded"></div>
                        <div style="display: inline-block; font-size: 12px; font-weight: bold;"><i class="fas fa-euro-sign"></i></div>
                    </td>
                </tr>
            </table>
        </div>

    </div>
</template>

<script>
    (function() {
        instrument(document)
        
        window.instrumentModals = instrument
        
        function instrument(root) {
            ;[...root.querySelectorAll('.open-modal')].forEach(button => {
                button.addEventListener('click', e => {
                    e.stopPropagation()
                    const modalSelector = button.getAttribute('open-modal-selector')
                    const modal = root.querySelector(modalSelector)
                    showModal(modal)
                })
            })

            ;[...root.querySelectorAll('.close-modal')].forEach(button => {
                button.addEventListener('click', () => {
                    const modalSelector = button.getAttribute('close-modal-selector')
                    const modal = root.querySelector(modalSelector)
                    hideModal(modal)
                })
            })

            ;[...root.querySelectorAll('.modal')].forEach(modal => {
                modal.addEventListener('click', e => e.stopPropagation())
            })

            window.addEventListener('click', () => {
                ;[...root.querySelectorAll('.modal')].forEach(hideModal)
            })
        }
        
        function showModal(modal) {
            modal.classList.add('visible')
            ;[...modal.querySelectorAll('input')].forEach(e => e.value = '')
        }
        
        function hideModal(modal) {
            modal.classList.remove('visible')
        }
    })();
    
</script>

<script>
    document.querySelector('#price-alert-modal form').addEventListener('submit', e => {
        e.preventDefault()
        document.querySelector('#price-alert-modal').classList.remove('visible')
        document.querySelector('#price-alert-modal-success').classList.add('visible')
    })
    
    document.querySelector('#price-alert-modal-success form').addEventListener('submit', e => {
        e.preventDefault()
        document.querySelector('#price-alert-modal-success').classList.remove('visible')
    })
    
</script>
<script>
(function() {
    window.findRoutes = routes
    
    const flights = preparedFlights(window.dataset.flights)
    
    function routes(hops, from, to, timestamp) {
        return find(flights, hops, from, to, timestamp, {}).map(unwrappedPlan)
        
        function find(flights, hops, from, to, timestamp, visited) {
            if (hops < 0) return []
            const startingPoints = flights.filter(it => it.departure.airport === from && it.departure.timestamp >= timestamp && sameDay(it.departure.timestamp, timestamp))
            
            const directPlans = startingPoints.filter(it => it.arrival.airport === to).map(it => [ it ])
            
            const indirectPlans = startingPoints.map((first) => {
                const { arrival } = first
                const rest = find(flights, hops - 1, arrival.airport, to, arrival.timestamp)
                return rest.map(it => [ first, ...it ])
            }).reduce(concatArrays, [])
            
            return [
                ...directPlans,
                ...indirectPlans,
            ]   
        }
    }
    
    function preparedFlights(original) {
        return original.map(item => {
            const { departureAirport, arrivalAirport, departureDate, departureTime, arrivalDate, arrivalTime } = item
            return {
                item,
                departure: {
                    airport: departureAirport,
                    timestamp: new Date(`${departureDate}T${departureTime}:00Z`),
                },
                arrival: {
                    airport: arrivalAirport,
                    timestamp: new Date(`${arrivalDate}T${arrivalTime}:00Z`),
                },
            }
        })
    }
    
    function sameDay(a, b) {
        return a.getYear() === b.getYear() && a.getMonth() === b.getMonth() && a.getDate() === b.getDate()
    }
    
    function unwrappedPlan(plan) {
        return plan.map(it => it.item)
    }
})();
    
(function() {
<?php
    if ($_GET['type'] == 'roundtrip') {
?>
    const departure = '<?=$_GET['departure']?>';
    const arrival = '<?=$_GET['arrival']?>';
    const date0 = new Date('<?=$_GET['departureDate']?>T00:00:00Z');
    const date1 = new Date('<?=$_GET['arrivalDate']?>T00:00:00Z');
    const queries = [
        { from: departure, to: arrival, when: date0 },
        { from: arrival, to: departure, when: date1 },
    ]
<?php
    } else if ($_GET['type'] == 'oneway') {
?>
    const departure = '<?=$_GET['departure']?>';
    const arrival = '<?=$_GET['arrival']?>';
    const date0 = new Date('<?=$_GET['departureDate']?>T00:00:00Z');
    const queries = [
        { from: departure, to: arrival, when: date0 },
    ]
<?php
    } else if ($_GET['type'] == 'multicity') {
        $multiCityEntries = array();
        while (isset($_GET['arrival_'.count($multiCityEntries)])) {
            $entry = array(
                'arrival' => $_GET['arrival_'.count($multiCityEntries)],
                'departure' => $_GET['departure_'.count($multiCityEntries)],
                'departureDate' => $_GET['departureDate_'.count($multiCityEntries)],
            );
            array_push($multiCityEntries, $entry);
        }
?>
    const entries = <?=json_encode($multiCityEntries)?>;
    const queries = entries.map(({ arrival, departure, departureDate }) => ({
        from: departure,
        to: arrival,
        when: new Date(`${departureDate}T00:00:00Z`),
    }))
    
    
<?php
    } else {
?>
    const queries = []
<?php
    }
?>
    
    const results = combinedResults(queries)
    renderResults(results)
    
    document.querySelector('.results-screen').classList.toggle('no-results', results.length == 0)
    document.querySelector('.no-results-message').classList.toggle('no-results', results.length == 0)
    
    let filter
    let sorting
    
    window.applyFilter = newFilter => {
        filter = newFilter
        refresh()
    }
    
    window.applySorting = newSorting => {
        sorting = newSorting
        refresh()
    }
    
    window.fullResultSet = function() {
        return [ ...results ]
    }
    
    window.resultsForAnotherDate = function(tripIndex, date) {
        const query = queries[tripIndex]
        const updatedQuery = { ...query, when: date }
        return combinedResults([ updatedQuery ])
    }
    
    function refresh() {
        const subset = filter ? results.filter(filter) : results
        sorting && subset.sort(sorting)
        renderResults(subset)
    }
    
    function combinedResults(searches) {
        const results = searches.map(searchWithCitiesResolved).map(it => it.map(({ from, to, when }) => window.findRoutes(3, from, to, when).map(wrappedInArray)).reduce(concatArrays, []))
        return results.reduce(crossArrays)
    }
    
    function searchWithCitiesResolved(search) {
        const cities = cityMappings()
        const l0 = [ search ]
        const l1 = l0.map(it => {
            const resolved = cities[it.from]
            if (!resolved) return [ it ]
            return resolved.map(airport => ({ ...it, from: airport }))
        }).reduce(concatArrays, [])
        
        const l2 = l1.map(it => {
            const resolved = cities[it.to]
            if (!resolved) return [ it ]
            return resolved.map(airport => ({ ...it, to: airport }))
        }).reduce(concatArrays, [])
        
        return l2
    }
    
    function renderResults(items) {
        renderFromTemplate('template#search-results-template', '#search-results-container', items, (ele, plan) => {

            ele.querySelector('#offer-modal form').addEventListener('submit', e => e.preventDefault())  
            
            instrumentCollapsables(ele.querySelector('.root'))
            instrumentModals(ele.querySelector('.root'))
            
            const allFlights = plan.reduce(concatArrays, [])
            const totalPrice = totalPlanPrice(plan)
            
            const priceForAllPeople = totalPrice * document.getElementById('travellersInput').value
            ele.getElementById('price-sum').textContent = priceForAllPeople.toFixed(2)
        
            renderFromTemplate('template#flight-info', ele.getElementById('flight'), plan, (ele, trip) => {
                
                
                var stopsNum = 0
                var allAirlines = ''
                
                const first = trip[0] // First flight.
                const last = trip[trip.length - 1] // Last flight.

                for(i = 0; i < trip.length; i++) {

                    if(trip.length == 1) {
                        stopsNum = 'Tiesioginis'
                        ele.getElementById('stop-number').textContent = stopsNum
                        ele.getElementById('stop-number').style.color = "green"
                        ele.getElementById('all-logo').src = urlForLogo(trip[i].airline)
                    }
                    else {
                        stopsNum = trip.length - 1 + ' persėdimas'
                        ele.getElementById('stop-number').textContent = stopsNum
                        ele.getElementById('stop-number').style.color = "#E06273"
                        if(i == 0) {
                            allAirlines = trip[i].airline
                        }
                        else {
                            allAirlines += ' + ' + trip[i].airline
                        }
                    }
                }




                const finalTime = asMilliseconds(last.arrivalDate, last.arrivalTime)
                const startTime = asMilliseconds(first.departureDate, first.departureTime)

                const totalDuration = finalTime - startTime
                
                ele.getElementById('departure-airport').textContent = airportCode(first.departureAirport)
                ele.getElementById('airline').textContent = allAirlines
                ele.getElementById('departure-time').textContent = first.departureTime
                ele.getElementById('duration').textContent = durationConverter(totalDuration)
                ele.getElementById('arrival-airport').textContent = airportCode(last.arrivalAirport)
                ele.getElementById('arrival-time').textContent = last.arrivalTime
            })
            
            const detailedInfoEntries = plan.map(trip => trip.reduce((acc, it) => {
                if (!acc.length) return [ { flight: it } ]
                const last = acc[acc.length - 1].flight
                const start = asMilliseconds(last.arrivalDate, last.arrivalTime)
                const end = asMilliseconds(it.departureDate, it.departureTime)
                const duration = end - start
                const layover = { duration }
                return [
                    ...acc,
                    { layover },
                    { flight: it },
                ]
            }, [])).reduce(concatArrays, [])
            
            renderFromTemplate('template#flight-info-expanded', ele.querySelector('.detailed-flight-info'), detailedInfoEntries, (ele, { flight, layover }) => {
                if (!layover) {
                    ele.querySelector('.layover-container').classList.add('hidden')
                } else {
                    // TODO bind layover information to ele.
                    ele.getElementById('layover-duration').textContent = durationConverter(layover.duration)
                }
                if (!flight) {
                    ele.querySelector('.flight-container').classList.add('hidden')
                } else {
                    // ele is that blue line...
                    ele.getElementById('date-expanded').textContent = flight.departureDate
                    ele.getElementById('departure-time-expanded').textContent = flight.departureTime
                    ele.getElementById('arrival-time-expanded').textContent = flight.arrivalTime
                    ele.getElementById('departure-airport-expanded').textContent = flight.departureAirport
                    ele.getElementById('arrival-airport-expanded').textContent = flight.arrivalAirport
                    ele.getElementById('ticket-price-expanded').textContent = (flight.price * document.getElementById('travellersInput').value).toFixed(2)
                    ele.getElementById('duration-expanded').textContent = flight.duration
                    ele.getElementById('logo-id').src = urlForLogo(flight.airline)
                }
            })
        })
    }
    
    
    function durationConverter(totalDuration) { 
        var temp = totalDuration / 1000 / 60
        return Math.floor(temp / 60) + ' val. ' + temp % 60
    }
    
    function urlForLogo(airline) {
        if(airline == 'Ryanair') {
            return "../images/Ryanair_logo.png"
        }
        else if(airline == "Wizzair") {
            return "../images/Wizz_logo.png"
        }
        else if(airline == "Vueling") {
            return "../images/Vueling_logo.png"
        }
        else if(airline == "AirBaltic") {
            return "../images/AirBaltic_logo.png"
        }
        else if(airline == "EasyJet") {
            return "../images/EasyJet_logo.png"
        }
    }
    
    function crossArrays(a, b) {
        return a.map(ai => b.map(bi => [ ...ai, ...bi ])).reduce(concatArrays, [])
    }
    
    function wrappedInArray(a) {
        return [ a ]
    }
    
    function cityMappings() {
        const departures = window.dataset.flights.filter(it => it.departureCity).map(it => [it.departureCity, it.departureAirport])
        const arrivals = window.dataset.flights.filter(it => it.arrivalCity).map(it => [it.arrivalCity, it.arrivalAirport])
        const all = [ ...departures, ...arrivals ]
        return all.reduce((acc, it) => {
            const [ city, airport ] = it
            acc[city] = acc[city] || []
            acc[city].includes(airport) || acc[city].push(airport)
            return acc
        }, {})
    }
})();
</script>

<script>
(function() {
    const results = window.fullResultSet()
    if (results.length === 0) {
        // TODO Hide results
        
    }
})()
</script>
    
<script>

    
function totalLayover(plan) {
    return plan.map(it => oneFlightLayover(it)).reduce((a, b) => a + b, 0)

             
    function oneFlightLayover(plan){
        
        var totalLayover = 0
        
        for(i = 0; i < plan.length-1; i++) {
            const currentArrivalTime = asMilliseconds(plan[i].arrivalDate, plan[i].arrivalTime)
            const nextDepartureTime = asMilliseconds(plan[i+1].departureDate, plan[i+1].departureTime)
            totalLayover += nextDepartureTime - currentArrivalTime
        }    
    
        return totalLayover
    }
    
}
</script>

<script>
(function() {
    let byHops = noFilter();
    let byPrice = noFilter();
    let byAirline = noFilter();
    let byAirport = noFilter();
    let byFlightDuration = noFilter();
    let byWaitDuration = noFilter();
    
    setupSeatFiltering()
    setupPriceFiltering()
    setupAirlinesFilter()
    setupAirportsFilter()
    setupDurationFiltering()
    setupLayoverFiltering()
    
    function setupSeatFiltering() {
        RenderCheckboxFilterFromTemplate({
            root: '#stops-filter',
            slug: 'stops',
            title: 'Persėdimai',
            values: [ 'h0', 'h1', 'h2p' ],
            formatValue: v => {
                if (v === 'h0') return 'Tiesioginis skrydis'
                if (v === 'h1') return '1 persėdimas'
                if (v === 'h2p') return '2+ persėdimai'
                return v
            },
            update: checked => {
                if (!checked.length) {
                    byHops = noFilter()
                } else {
                    byHops = plan => {
                        const hops = plan.map(it => it.length - 1)
                        const ok0 = checked.includes('h0') || undefined === hops.find(n => n === 0)
                        const ok1 = checked.includes('h1') || undefined === hops.find(n => n === 1)
                        const ok2p = checked.includes('h2p') || undefined ===  hops.find(n => n >= 2)
                        return ok0 && ok1 && ok2p
                    }
                }
                reapply()
            },
        })
    }
    
    function setupPriceFiltering() {
        RenderSliderFilterFromTemplate({
            root: '#price-filter',
            slug: 'price',
            title: 'Kaina',
            range: () => {
                const prices = window.fullResultSet().map(totalPlanPrice)
                const minPrice = Math.min(...prices)
                const maxPrice = Math.max(...prices)
                return [minPrice, maxPrice]
            },
            formatValue: v => v + '€',
            update: (minValue, maxValue) => {
                byPrice = plan => {
                    const c = totalPlanPrice(plan) 
                    return minValue <= c && c <= maxValue
                }
                reapply()
            },
        })
    }
    
    function setupAirlinesFilter() {
        RenderCheckboxFilterFromTemplate({
            root: '#airlines-filter',
            slug: 'airlines',
            title: 'Oro linijų bendrovės',
            enableSearch: true,
            values: () => airlinesFromResultSet(window.fullResultSet()),
            update: checked => {
                if (!checked.length) {
                    byAirline = noFilter()
                } else {
                    byAirline = plan => {
                        return airlinesFromPlan(plan).every(k => checked.includes(k))
                    }
                }
                reapply()
            },
        })
        
        function airlinesFromResultSet(results) {
            return unique(results.map(airlinesFromPlan).reduce(concatArrays, []))
        }
    
        function airlinesFromPlan(plan) {
            return unique(plan.reduce(concatArrays, []).map(it => it.airline))
        }
        
        function unique(values) {
            return [ ...new Set(values) ]
        }
    }
    
    function setupAirportsFilter() {
        RenderCheckboxFilterFromTemplate({
            root: '#airports-filter',
            slug: 'airports',
            title: 'Oro uostai',
            formatValue: airportCode,
            enableSearch: true,
            values: () => airportsFromResultSet(window.fullResultSet()),
            update: checked => {
                if (!checked.length) {
                    byAirport = noFilter()
                } else {
                    byAirport = plan => {
                        return airportsFromPlan(plan).every(k => checked.includes(k))
                    }
                }
                reapply()
            },
        })
        
        function airportsFromResultSet(results) {
            return unique(results.map(airportsFromPlan).reduce(concatArrays, []))
            
        }
    
        function airportsFromPlan(plan) {
           const departureAirports = unique(plan.reduce(concatArrays, []).map(it => it.departureAirport))
           const arrivalAirports = unique(plan.reduce(concatArrays, []).map(it => it.arrivalAirport))
           return departureAirports.concat(arrivalAirports)
        }
        
        function unique(values) {
            return [ ...new Set(values) ]
        }
        

    }
    
    function setupDurationFiltering() {
        RenderSliderFilterFromTemplate({
            root: '#duration-filter',
            slug: 'duration',
            title: 'Skrydžio trukmė',
            scale: 60000,
            range: () => {
                const durations = window.fullResultSet().map(totalPlanDuration)
                const minDuration = Math.min(...durations)
                const maxDuration = Math.max(...durations)
                return [ minDuration, maxDuration ]
            },
            formatValue: v => {
                const hours = Math.floor(v / 1000 / 60 / 60)
                const minutes = Math.floor(v / 1000 / 60 % 60)
                return hours + ' val. ' + minutes
            },
            update: (minValue, maxValue) => {
                byFlightDuration = plan => {
                    const c = totalPlanDuration(plan)
                    return minValue <= c && c <= maxValue
                }
                reapply()
            },
        })
    }
    
    function setupLayoverFiltering() {
        RenderSliderFilterFromTemplate({
            root: '#layover-filter',
            slug: 'layover',
            title: 'Persėdimo trukmė',
            scale: 60000,
            range: () => {
                const layovers = window.fullResultSet().map(totalLayover)
                const minLayover = Math.min(...layovers)
                const maxLayover = Math.max(...layovers)
                return [ minLayover, maxLayover ]
            },
            formatValue: v => {
                const hours = Math.floor(v / 1000 / 60 / 60)
                const minutes = Math.floor(v / 1000 / 60 % 60)
                return hours + ' val. ' + minutes
            },
            update: (minValue, maxValue) => {
                byWaitDuration = plan => {
                    const c = totalLayover(plan)
                    return minValue <= c && c <= maxValue
                }
                reapply()
            },
        })
    }
    
    function reapply() {
        window.applyFilter(p => {
            const flags = [ byHops(p), byPrice(p), byAirline(p), byAirport(p), byFlightDuration(p), byWaitDuration(p) ]
            return flags.every(it => it)
        })
    }
    
    function noFilter() {
        return () => true
    }
    
    function SliderFilterSection({ root, slug, title, range, formatValue, onChange }) {
        range = (typeof range === 'function' ? range() : range)
        
        const [ minValue, maxValue ] = range

        renderFromTemplate('template#slider-checkbox-section-template', root, [0], root => {
            root.querySelector('.title').textContent = title
            
        })
    }
})();
    
(function() {
    const selectEle = document.querySelector('select#sorting')
    
    selectEle.addEventListener('change', () => setSorting(selectEle.value))
    setSorting(selectEle.value)
    
    function setSorting(kind) {
        if (kind === 'shortest') {
            window.applySorting(byShortestDuration)
        } else if (kind === 'longest') {
            window.applySorting(byLongestDuration)
        } else if (kind === 'cheapest') {
            window.applySorting(byCheapestPrice)
        } else if(kind === 'expensive') {
            window.applySorting(byExpensivePrice)
        }
    }
    
    function byShortestDuration(a, b) {
        return totalPlanDuration(a) - totalPlanDuration(b)
    }
    
    function byLongestDuration(a, b) {
        return totalPlanDuration(b) - totalPlanDuration(a)
    }
    
    function byCheapestPrice(a, b) {
        return totalPlanPrice(a) - totalPlanPrice(b)
    }
    
    function byExpensivePrice(a, b) {
        return totalPlanPrice(b) - totalPlanPrice(a)
    }
    

})();
    
</script>


<template id="price-graph-entry-template">
    <div>
        <div class="price-tooltip"><span class="numeric-value"></span><i class="fas fa-euro-sign"></i></div>
        <div class="price-bar"></div>
        <div class="day">XX</div>
    </div>
</template>

<script>
    (function() {
        const departureUrl = urlWithUpdatedDateParam(window.location.href, 'departureDate')
        const arrivalUrl = urlWithUpdatedDateParam(window.location.href, 'arrivalDate')
<?php
    if ($_GET['type'] == 'roundtrip') {
?>
        const date0 = new Date('<?=$_GET['departureDate']?>T00:00:00Z');
        const date1 = new Date('<?=$_GET['arrivalDate']?>T00:00:00Z');
        renderFor(date0, 0, '.stats-lane .first', departureUrl)
        renderFor(date1, 1, '.stats-lane .second', arrivalUrl)
<?php } else if ($_GET['type'] == 'oneway') { ?>
        const date0 = new Date('<?=$_GET['departureDate']?>T00:00:00Z');
        renderFor(date0, 0, '.stats-lane .first', departureUrl)
        document.querySelector('.stats-lane .second').classList.add('hidden')
<?php } else { ?>
        document.querySelector('.stats-lane .first').classList.add('hidden')
        document.querySelector('.stats-lane .second').classList.add('hidden')
<?php } ?>
 
        function renderFor(currentDate, tripIndex, root, makeUrl) {
            root = document.querySelector(root)
            const deltas = [ -5, -4, -3, -2, -1, 0, 1, 2, 3, 4, 5 ]
            // const date0 = new Date('<?=$_GET['departureDate']?>T00:00:00Z');
            // const date1 = new Date('<?=$_GET['arrivalDate']?>T00:00:00Z');

            const data = deltas.map(delta => plusDays(currentDate, delta)).map(dataEntryFor(tripIndex))

            const allPrices = data.map(it => it.price).filter(it => it)
            const minPrice = Math.min(...allPrices)
            const maxPrice = Math.max(...allPrices)
            
            const p0 = Math.max(minPrice - 30, 0)
            const p100 = maxPrice
            
            root.querySelector('.numbers .top').textContent = p100.toFixed(2) + '€'
            root.querySelector('.numbers .bottom').textContent = p0.toFixed(2) + '€'

            renderFromTemplate('template#price-graph-entry-template', root.querySelector('.prices-stats'), data, (ele, { date, price }) => {
                const tooltip = ele.querySelector('.price-tooltip')
                const bar = ele.querySelector('.price-bar')
                const day = ele.querySelector('.day')
                
                if(currentDate.getTime() == date.getTime()) {
                    bar.style.background = "#0EACBF";
                }
                
                const percents = (price - p0) / (p100 - p0)
                bar.style.height = `${Math.floor(percents * 100)}px`
                day.textContent = date.getDate()
                
                tooltip.querySelector('.numeric-value').textContent = price
                
                bar.addEventListener('mouseenter', () => tooltip.classList.add('visible'))
                bar.addEventListener('mouseleave', () => tooltip.classList.remove('visible'))
                bar.addEventListener('click', () => window.open(makeUrl(date), '_self'))
            })
        }
        
        function dataEntryFor(tripIndex) {
            return date => {
                const results = window.resultsForAnotherDate(tripIndex, date)
                if (!results.length) {
                    return { date }
                } else {
                    return { date, price: Math.min(...results.map(totalPlanPrice)) }
                }
            }
        }
        
        function plusDays(date, delta) {
            const d = new Date(date.getTime())
            d.setDate(d.getDate() + delta)
            return d
        }
        
        function urlWithUpdatedDateParam(originalUrl, param) {
            const re = new RegExp(`${param}=\\d{4}-\\d{2}-\\d{2}`)
            return date => {
                const newDate = date.toISOString().substring(0, 10)
                const replacement = `${param}=${newDate}`
                return originalUrl.replace(re, replacement)
            }
        }
    })()
</script>