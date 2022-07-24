function ExpenseCalc(props) {
    // let totalExpenses = 0;

    // for (const expenses of props.expenses) {
    //   let {amount} = expenses;
    //   totalExpenses += amount;
    // }

    const totalExpenses = props.expenses.reduce((acc, curr) => acc + parseFloat(curr.amount), 0) 


    return (
        <div>
            <p>Your total expenses: <br />
            - €{totalExpenses.toFixed(2)}</p>
        </div>
        
    )
}

export default ExpenseCalc;