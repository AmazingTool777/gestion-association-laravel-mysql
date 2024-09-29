import Alpine from "alpinejs";
import axios from "axios";

function donatorsData() {
    const donationCallId = window.location.pathname.split("/").pop();

    return {
        isLoaded: false,
        isLoading: false,
        page: 1,
        last_page: 1,
        donations: [],
        links: [],
        async getDonations(page, fromFocus = false) {
            this.isLoading = !fromFocus;
            const PAGE_SIZE = 5;
            const URL = `/api/donations?page=${page}&page_size=${PAGE_SIZE}&donation_call_id=${donationCallId}`;
            try {
                const { data } = await axios.get(URL, {
                    headers: {
                        Accept: "application/json",
                    },
                    withCredentials: true,
                });
                if (!this.isLoaded) {
                    this.isLoaded = true;
                }
                this.isLoading = false;
                this.donations = data.data;
                this.links = data.links;
                this.page = data.current_page;
                this.last_page = data.last_page;
            } catch (error) {
                console.log(error);
            }
        },
        init() {
            let hasLeftTab = false;
            // Detect when the user leaves the tab
            document.addEventListener("visibilitychange", function () {
                if (document.hidden) {
                    hasLeftTab = true;
                }
            });
            // Detect when the user returns to the tab
            window.addEventListener("focus", () => {
                if (hasLeftTab) {
                    this.getDonations(this.page, true);
                    hasLeftTab = false; // Reset the flag
                }
            });
        },
    };
}

Alpine.data("donations", donatorsData);

Alpine.start();
