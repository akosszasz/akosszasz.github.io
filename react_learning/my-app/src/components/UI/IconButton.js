import './IconButton.css';

function IconButton(props) {
    const classes = 'icon-button ' + props.className;
    const clickEvent = props.onClick;
    return <div className={classes} onClick={clickEvent}>{props.children}</div>;
}

export default IconButton;