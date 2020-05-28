function renderFromTemplate(templateSelector, containerSelector, items, renderItem) {
    const template = (typeof templateSelector === 'string' ? document.querySelector(templateSelector) : templateSelector)
    const container = (typeof containerSelector === 'string' ? document.querySelector(containerSelector) : containerSelector)

    container.innerHTML = ''
    items.forEach(item => {
        const child = template.content.cloneNode(true)
        renderItem(child, item)
        container.appendChild(child)
    })
}

function concatArrays(a, b) {
    return [ ...a, ...b ]
}

function asMilliseconds(date, time) {
    return new Date(`${date}T${time}:00Z`).getTime()
}

function airportCode(str) {
    return str.match(/\(([A-Z]+)\)/)[1]
}

function totalPlanPrice(plan) {
    return plan.reduce(concatArrays, []).map(it => it.price).reduce((a, b) => a + b, 0)
}
    
function totalPlanDuration(plan) {
    return plan.map(it => oneFlightDuration(it)).reduce((a, b) => a + b, 0)

             
    function oneFlightDuration(plan){
        
        const first = plan[0] // First flight.
        const last = plan[plan.length - 1] // Last flight.

        const finalTime = asMilliseconds(last.arrivalDate, last.arrivalTime)
        const startTime = asMilliseconds(first.departureDate, first.departureTime)

        const totalDuration = finalTime - startTime

        return totalDuration
    }
    
}
