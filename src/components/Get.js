import React,{useState} from 'react';
import { makeStyles } from '@material-ui/core/styles';
import Card from '@material-ui/core/Card';
import CardActionArea from '@material-ui/core/CardActionArea';
import CardActions from '@material-ui/core/CardActions';
import CardContent from '@material-ui/core/CardContent';
import CardMedia from '@material-ui/core/CardMedia';
// import Button from '@material-ui/core/Button';
import Typography from '@material-ui/core/Typography';

import './Get.css';
import {Nav,Navbar,Row,Col,Container,Button} from 'react-bootstrap';
import './bootstrap-4.5.0-dist/css/bootstrap.min.css';
import {NavLink,BrowserRouter} from 'react-router-dom';
import {GitHub,WhatsApp,LinkedIn,Instagram} from '@material-ui/icons';

const Get = () =>{
	const [state,setState] = useState([]);
	const [loader,setLoader] = useState([]);
	const [main,setMain] = useState(false);
	const useStyles = makeStyles({
  root: {
    maxWidth: 300,
   marginTop: 20,
  },
});
  const classes = useStyles();
  const load = async() =>
  {
  	setMain(true)
  	setLoader(false);
  	const res = await fetch("https://reqres.in/api/users?page=1");
  	const jsonres = await res.json();
  	setState(jsonres['data']);
  	setTimeout(() => {
      setLoader(true);
    }, 500)
  	
  };


	return (
		<div className="pt_70 bg_image">
			<BrowserRouter>
		  <Navbar collapseonselect="true" expand="lg" variant="dark" className="header" fixed="top">
		      <Navbar.Brand href="#home" className="navbrand">
		      <span>LGM </span>Task_2
		      </Navbar.Brand>
		      <Navbar.Toggle aria-controls="responsive-navbar-nav"/>
			 <Navbar.Collapse>
			 	<Nav className="mr-auto header_middle">
			 	<Nav.Link as={NavLink} exact to="/" onClick={load} className= "header_link" >
			 	Get Users
			 	</Nav.Link>
			 	</Nav>
			 	<div className="header_right d-none d-md-block">
			 				<a href="https://github.com/jay-498" target='_blank' rel="noreferrer">
			 					<GitHub />
			 				</a>
			 				<a href="https://api.whatsapp.com/send?phone=919390181313" target='_blank' rel="noreferrer">
			 					<WhatsApp />
			 				</a>
			 				<a href="https://www.linkedin.com/in/ajay-pediredla-125887191" rel="noreferrer" target='_blank'>
			 					<LinkedIn />
			 				</a>
			 				<a href="https://www.instagram.com/_ajay_pediredla__/" target='_blank' rel="noreferrer">
			 					<Instagram />
			 				</a>
			 	</div>
			 </Navbar.Collapse>
		  </Navbar>
		  </BrowserRouter>
		  <div className="container pt-5 mt-3">
		  {main ? 
		  	<Container>
			  <Row>
			  {loader ?
			  state.map(({id,email,first_name,last_name,avatar}) => (
			  		<Col md={4} key={id}>
			    	<Card className={classes.root} >
				      <CardActionArea>
				        <CardMedia
				          component="img"
				          alt={first_name}
				          height="220px"
				          image={avatar}
				          title={first_name}
				        />
				        <CardContent>
				          <Typography gutterBottom variant="h5" component="h2">
				            {first_name+' '+last_name}
				          </Typography>
				          <Typography variant="body2" color="textSecondary" component="p">
				            Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old
				          </Typography>
				        </CardContent>
				      </CardActionArea>
				      <CardActions>
				        <a href = {'mailto:'+email}><Button variant="info" className="ml-5">
				          {email}
				        </Button></a>
				      </CardActions>
				    </Card>
			    </Col>
							  	)) : 
			  <div className="mt-5">
			  <div className="spinner-border text-primary" role="status">
				  <span className="sr-only">Loading...</span>
				</div>
				<div className="spinner-border text-secondary" role="status">
				  <span className="sr-only">Loading...</span>
				</div>
				<div className="spinner-border text-success" role="status">
				  <span className="sr-only">Loading...</span>
				</div>
				<div className="spinner-border text-danger" role="status">
				  <span className="sr-only">Loading...</span>
				</div>
				<div className="spinner-border text-warning" role="status">
				  <span className="sr-only">Loading...</span>
				</div>
				<div className="spinner-border text-info" role="status">
				  <span className="sr-only">Loading...</span>
				</div>
				<div className="spinner-border text-light" role="status">
				  <span className="sr-only">Loading...</span>
				</div>
				<div className="spinner-border text-dark" role="status">
				  <span className="sr-only">Loading...</span>
				</div>
				</div> }
			  </Row>
			</Container>
			:
			<Container className="container pt-5 mt-5">
				<Button variant="info">Click Get Users to see User Cards</Button>
				           
			</Container>
		}
		    </div>
		    </div>
	);	
};


export default Get;