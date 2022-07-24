import './ExpenseDate.css';

function ExpenseDate(props) {
    const month = props.date.toLocaleString('en-UK', {month: 'long'});
    const day = props.date.toLocaleString('en-UK', {day: '2-digit'});
    const year = props.date.getFullYear();

    return (
        <div className="expense-item-date" >
            {day} {month} {year}
        </div>
    );
}

export default ExpenseDate;