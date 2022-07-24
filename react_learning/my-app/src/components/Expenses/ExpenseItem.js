import ExpenseDate from './ExpenseDate';
import Card from '../UI/Card'
import './ExpenseItem.css';

// ------------------- Start of FontAwesome ------------------- //
// import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
// import { library } from '@fortawesome/fontawesome-svg-core';
// import { fal } from '@fortawesome/pro-light-svg-icons';
// library.add(fal);
// -------------------- End of FontAwesome -------------------- //

function ExpenseItem(props) {
    // const amountDecimal = props.amount.toFixed(2);

    return (
        <li>
            <Card className="expense-item">
                <div className="expense-item-details">
                    <div className="icon">€</div>
                    <div className="title-wrapper">
                        <div className="expense-item-name">{props.title}</div>
                        <ExpenseDate date={props.date} />
                    </div>
                </div>
                <div className='expense-item-amount-wrapper'>
                    <div className="expense-item-amount">{parseFloat(props.amount).toFixed(2)}</div>
                </div>
            </Card>
        </li>
    );
}

export default ExpenseItem;