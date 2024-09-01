import { Modal } from "bootstrap/js/index.esm";

import setDropdown from "../components/dropdown";

// Auth user menu dropdown
setDropdown("auth-user-menu");

// Sign out modal
new Modal("#logout-modal");
