const sideMenu = document.querySelector('aside');
const menuBtn = document.getElementById('menu-btn');
const closeBtn = document.getElementById('close-btn');

const darkMode = document.querySelector('.dark-mode');

menuBtn.addEventListener('click', () => {
    sideMenu.style.display = 'block';
});

closeBtn.addEventListener('click', () => {
    sideMenu.style.display = 'none';
});

schema.txt

Orders.forEach(order => {
    // tr element 
    const tr = document.createElement('tr');

    // order content to be injected into the tr above.
    const trContent = `
        <td>${order.productName}</td>
        <td>${order.productNumber}</td>
        <td>${order.paymentStatus}</td>
        <td class = "${order.status === 'Declined' ? 'danger' : order.status === 'Pending' ? 'warning' : 'primary'}">${order.status}</td>
        <td class="primary">Details</td>
    `;

    // inject the order content into the tr 
    tr.innerHTML = trContent;

    // inject the tr into the tbody of the table 
    document.querySelector('table tbody').appendChild(tr);
})