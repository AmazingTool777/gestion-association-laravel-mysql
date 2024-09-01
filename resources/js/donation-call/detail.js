const donationForm = document.getElementById("donation-form");

/**
 * ******************************************************************************
 * The donation giver's phone number must match the selected mobile money payment
 * ******************************************************************************
 */

const donationMobilePaymentsInputs = donationForm["mobile_money_name"];
const donationGiverPhoneInput = donationForm["donation_giver_phone"];

const mobileMoneyPrefixMap = {
    "orange-money": "32",
    "airtel-money": "33",
    mvola: "34",
};

const endPhonePattern = "\\s?(\\d\\s?){6}$";

function handleMobileMoneyPaymentChange(e) {
    const mobileMoney = e.target.value;

    donationGiverPhoneInput.pattern =
        "^" + mobileMoneyPrefixMap[mobileMoney] + endPhonePattern;
    donationGiverPhoneInput.placeholder =
        donationGiverPhoneInput.placeholder.replace(
            /^(32|33|34|3X)/,
            mobileMoneyPrefixMap[mobileMoney]
        );
}

for (const mobileMoneyInput of donationMobilePaymentsInputs) {
    mobileMoneyInput.addEventListener("change", handleMobileMoneyPaymentChange);
}

/**************************************************************************** */

/**
 * ******************************************************************************
 * The donation amount must be an integer that is comprised between 1 and the required amount
 * ******************************************************************************
 */

const donationAmountInput = donationForm["amount"];
const donationAmount = parseInt(donationAmountInput.max);

donationAmountInput.addEventListener("input", (e) => {
    const inputAmount = parseInt(e.target.value);
    if (isNaN(inputAmount)) return;
    if (inputAmount < 1) {
        donationAmountInput.value = 1;
    } else if (inputAmount > donationAmount) {
        donationAmountInput.value = donationAmount;
    }
});

/*******************************************************************************/
