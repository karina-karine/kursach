// js/service-details.js
document.addEventListener("DOMContentLoaded", () => {
    const serviceNavItems = document.querySelectorAll(".service-nav-item")
    const detailTitle = document.getElementById("detail-title")
    const detailBreadcrumbTitle = document.getElementById("detail-breadcrumb-title")
    const detailIcon = document.getElementById("detail-icon")
    const detailShortDescription = document.getElementById("detail-short-description")
    const detailPrice = document.getElementById("detail-price")
    const detailDeliveryTime = document.getElementById("detail-delivery-time")
    const detailFullDescription = document.getElementById("detail-full-description")
        ? document.getElementById("detail-full-description").querySelector("p")
        : null
    const detailFeatures = document.getElementById("detail-features")
    const detailRequirements = document.getElementById("detail-requirements")
    const detailProcess = document.getElementById("detail-process")

    // Declare servicesData variable here
    const servicesData = window.servicesData // Assuming servicesData is globally available from PHP's json_encode in service-details-page.php

    function updateServiceDetails(serviceId) {
        const service = servicesData[serviceId] // Access by key directly

        if (service) {
            detailTitle.textContent = service.name
            detailBreadcrumbTitle.textContent = service.name
            detailIcon.textContent = service.icon // For emoji
            detailShortDescription.textContent = service.short_description
            detailPrice.textContent = `Ціна від: ${service.price_from} грн`
            detailDeliveryTime.textContent = `Термін виконання: ${service.delivery_time}`
            if (detailFullDescription) {
                detailFullDescription.innerHTML = service.full_description.replace(/\n/g, "<br>")
            }

            // Update Features
            if (detailFeatures) {
                detailFeatures.innerHTML = ""
                if (service.features && service.features.length > 0) {
                    service.features.forEach((feature) => {
                        const li = document.createElement("li")
                        li.innerHTML = `<span class="feature-icon">&#10003;</span> ${feature}`
                        detailFeatures.appendChild(li)
                    })
                    detailFeatures.closest(".service-details-features").style.display = "block" // Ensure section is visible
                } else {
                    detailFeatures.closest(".service-details-features").style.display = "none"
                }
            }

            // Update Requirements
            if (detailRequirements) {
                detailRequirements.innerHTML = ""
                if (service.requirements && service.requirements.length > 0) {
                    service.requirements.forEach((req) => {
                        const li = document.createElement("li")
                        li.innerHTML = `<span class="requirement-icon">&#9679;</span> ${req}`
                        detailRequirements.appendChild(li)
                    })
                    detailRequirements.closest(".service-details-requirements").style.display = "block" // Ensure section is visible
                } else {
                    detailRequirements.closest(".service-details-requirements").style.display = "none"
                }
            }

            // Update Process
            if (detailProcess) {
                detailProcess.innerHTML = ""
                if (service.process && service.process.length > 0) {
                    service.process.forEach((step) => {
                        const li = document.createElement("li")
                        li.textContent = step
                        detailProcess.appendChild(li)
                    })
                    detailProcess.closest(".service-details-process").style.display = "block" // Ensure section is visible
                } else {
                    detailProcess.closest(".service-details-process").style.display = "none"
                }
            }

            // Update active class in sidebar
            serviceNavItems.forEach((item) => {
                item.classList.remove("active")
                if (item.dataset.serviceId === serviceId) {
                    item.classList.add("active")
                }
            })

            // Update URL without reloading the page
            const newUrl = new URL(window.location.href)
            newUrl.searchParams.set("service_id", serviceId)
            window.history.pushState({ path: newUrl.href }, "", newUrl.href)
        }
    }

    // Handle clicks on sidebar navigation items
    serviceNavItems.forEach((item) => {
        item.addEventListener("click", (event) => {
            event.preventDefault() // Prevent default link behavior
            const serviceId = event.target.dataset.serviceId
            updateServiceDetails(serviceId)
        })
    })

    // Initial load: check URL for service_id and update content
    const urlParams = new URLSearchParams(window.location.search)
    const initialServiceId = urlParams.get("service_id")
    if (initialServiceId && servicesData[initialServiceId]) {
        updateServiceDetails(initialServiceId)
    } else {
        // If no service_id in URL or invalid, default to the first service
        const firstServiceId = Object.keys(servicesData)[0]
        if (firstServiceId) {
            updateServiceDetails(firstServiceId)
        }
    }

    // Handle browser back/forward buttons
    window.addEventListener("popstate", (event) => {
        const params = new URLSearchParams(window.location.search)
        const serviceId = params.get("service_id")
        const firstServiceId = Object.keys(servicesData)[0]
        if (serviceId && servicesData[serviceId]) {
            updateServiceDetails(serviceId)
        } else if (firstServiceId) {
            updateServiceDetails(firstServiceId)
        }
    })
})
