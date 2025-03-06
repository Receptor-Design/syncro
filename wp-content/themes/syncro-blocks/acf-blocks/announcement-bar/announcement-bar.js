class NotificationFlag {
    static active = [];
    constructor(ele) {
        this.closed = false;
        this.container = ele;
        this.btn = this.container.querySelectorAll('#btn');
        this.close_btn = this.container.querySelectorAll('#close-btn');
        this.btn[0].addEventListener('click', () => this.toggleStatus());
        this.close_btn[0].addEventListener('click', () => this.toggleStatus());
        NotificationFlag.active.push(this);
    }

    flagToggle() {
        this.closed = this.container.classList.toggle('closed');
        if (this.closed == false) {
            this.container.classList.remove('closed');
        } else if (this.closed == true) {
            this.container.classList.add('closed');
        };
    }
    toggleStatus() {
        /*  const status = async () => {
            const responce = await fetch('/?rest_route=/session/v1/notification_toggle');
            const notification_status = await responce;
            console.log(notification_status)
            } */
        const url = '/?rest_route=/session/v1/notification_toggle';
        this.flagToggle();
        fetch(url).then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
            .then(data => {
                console.log(data);
                this.closed = data;
            })
            .catch(error => {
                console.error('Error: ', error);
            })
    }
}
const announcement_bar = new NotificationFlag(document.getElementById('announcement-bar'));