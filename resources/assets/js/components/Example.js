import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class Example extends Component {
    constructor(props) {
        super(props);
        this.state = {
            username: '',
            password: ''
        }
        this.handle = this.handle.bind(this);
        this.updateUsername = this.updateUsername.bind(this);
        this.updatePassword = this.updatePassword.bind(this);
    }
    render() {
        return (
            <div className="container">
                <div>
                    <input type="text" value={this.state.username} onChange={this.updateUsername} />
                </div>
                <div>
                    <input type="password" value={this.state.password} onChange={this.updatePassword} />
                </div>
                <div>
                    <button onClick={this.handle}>Login</button>
                </div>
            </div>
        );
    }

    updateUsername(e) {
        this.setState({username: e.target.value});
    }
    updatePassword(e) {
        this.setState({password: e.target.value});
    }

    handle(e) {
        console.log('sending', this.state.username, this.state.password);
        axios.post('/api/v1/login', {
            username: this.state.username,
            password: this.state.password
        }).then((response) => {
            console.log('response data', response.data, '--end');
        })
    }
}

if (document.getElementById('example')) {
    ReactDOM.render(<Example />, document.getElementById('example'));
}
