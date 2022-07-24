import './ExpensesFilter.css';

function ExpensesFilter(props) {

    function filterChangeHandler(event) {
        props.onChangeFilter(event.target.value);
    };

    return (
        <div className='expenses-filter'>
            <p>Filter by year</p>
            <select value={props.selected} onChange={filterChangeHandler}>
                <option value="2019">2019</option>
                <option value="2020">2020</option>
                <option value="2021">2021</option>
                <option value="2022">2022</option>
            </select>
        </div>
    );
};

export default ExpensesFilter;