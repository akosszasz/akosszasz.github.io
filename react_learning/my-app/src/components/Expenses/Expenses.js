import React, { useState } from 'react';

import ExpensesFilter from "./ExpensesFilter";
import ExpensesList from './ExpensesList';
import './Expenses.css';

function Expenses(props) {
  const [filteredYear, setFilteredYear] = useState('2020');

  function filterChangeHandler(selectedYear) {
    setFilteredYear(selectedYear);
  }

  const filteredExpenses = props.items.filter(expense => new Date(expense.date).getFullYear() === parseInt(filteredYear));

  return (
    <div className="expenses">
      <ExpensesFilter
        selected={filteredYear}
        onChangeFilter={filterChangeHandler}
      />
      <ExpensesList items={filteredExpenses} />
    </div>
  );
}

export default Expenses;