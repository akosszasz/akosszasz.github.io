import React, { useState } from "react";

import Expenses from "./components/Expenses/Expenses";
import NewExpense from "./components/NewExpense/NewExpense";
import ExpenseCalc from "./components/Expenses/ExpenseCalc";
import Card from "./components/UI/Card";

import "./components/Expenses/Expenses.css";

const DUMMY_EXPENSES = [
  {
    id: 'e1',
    title: 'Toilet Paper',
    amount: 94.12,
    date: new Date(2020, 7, 14),
  },
  {
    id: 'e2',
    title: 'New TV',
    amount: 799.49,
    date: new Date(2021, 2, 12),
  },
  {
    id: 'e3',
    title: 'Car Insurance',
    amount: 294.67,
    date: new Date(2021, 2, 28),
  },
  {
    id: 'e4',
    title: 'New Desk (Wooden)',
    amount: 450,
    date: new Date(2021, 5, 12),
  },
];

function App() {
  const [expenses, setExpenses] = useState(DUMMY_EXPENSES);

  const firstName = "Jonathan";

  function addExpenseHandler(expense) {
    setExpenses((prevExpenses) => {
      return [ expense, ...prevExpenses];
    })
  };

  return (

    <div className="expenses">
      <h2>Hello, <br /> {firstName}</h2>
      <NewExpense onAddExpense={addExpenseHandler} />
      <Card className="top-card">
        <ExpenseCalc expenses={expenses} />
      </Card>
      <Expenses items={expenses} />
    </div>
  );
}

export default App;
