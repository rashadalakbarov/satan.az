"use client";

import React from "react";
import Col from "react-bootstrap/Col";
import Nav from "react-bootstrap/Nav";
import Row from "react-bootstrap/Row";
import Tab from "react-bootstrap/Tab";
import Form from "react-bootstrap/Form";

// components
import ProfileProductSection from "@/components/ProfileProductSection";

const ProfileDashboardPage = () => {
  return (
    <>
      <h1 className="fs-4 mt-4 mb-5">Şəxsi kabinet</h1>

      <Tab.Container id="left-tabs-example" defaultActiveKey="first">
        <Row>
          <Col sm={3}>
            <Nav variant="pills" className="flex-column">
              <Nav.Item>
                <Nav.Link eventKey="first">Şəxsi kabinet</Nav.Link>
              </Nav.Item>
              <Nav.Item>
                <Nav.Link eventKey="second">Mənim elanlarım</Nav.Link>
              </Nav.Item>
              <Nav.Item>
                <Nav.Link eventKey="third">Tənzimləmələr</Nav.Link>
              </Nav.Item>
            </Nav>
          </Col>
          <Col sm={9}>
            <Tab.Content>
              <Tab.Pane eventKey="first">
                <ProfileProductSection title="Aktiv elanlar" />
                <h2 className="mb-3 border-bottom fs-5 pb-2">Elan limiti</h2>
                <h2 className="mb-3 border-bottom fs-5 pb-2">Kartlarım</h2>
              </Tab.Pane>
              <Tab.Pane eventKey="second">
                <ProfileProductSection title="Hazırda saytda" />
                <ProfileProductSection title="Müddəti başa çatmış" />
                <ProfileProductSection title="Gözləmədə" />
                <ProfileProductSection title="Dərc olunmamış" />
              </Tab.Pane>
              <Tab.Pane eventKey="third">
                <Form>
                  <Form.Group
                    as={Row}
                    className="mb-3"
                    controlId="formPlaintextUsername"
                  >
                    <Form.Label column sm="2">
                      Adınız
                    </Form.Label>
                    <Col sm="10">
                      <Form.Control
                        type="text"
                        placeholder="Adınızı daxil edin"
                      />
                    </Col>
                  </Form.Group>

                  <Form.Group
                    as={Row}
                    className="mb-3"
                    controlId="formPlaintextEmail"
                  >
                    <Form.Label column sm="2">
                      Email
                    </Form.Label>
                    <Col sm="10">
                      <Form.Control
                        type="text"
                        placeholder="E-poçt ünvanınızı daxil edin"
                      />
                    </Col>
                  </Form.Group>

                  <Form.Group
                    as={Row}
                    className="mb-3"
                    controlId="formPlaintextPassword"
                  >
                    <Form.Label column sm="2">
                      Şifrə
                    </Form.Label>
                    <Col sm="10">
                      <Form.Control
                        type="password"
                        placeholder="Şifrənizi daxil edin"
                      />
                    </Col>
                  </Form.Group>

                  <button type="submit" className="btn btn-success mt-4">
                    Yadda saxla
                  </button>
                </Form>
              </Tab.Pane>
            </Tab.Content>
          </Col>
        </Row>
      </Tab.Container>
    </>
  );
};

export default ProfileDashboardPage;
