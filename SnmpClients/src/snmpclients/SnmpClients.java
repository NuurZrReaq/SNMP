/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package snmpclients;

import java.io.IOException;
import java.util.logging.Level;
import java.util.logging.Logger;
import org.snmp4j.CommunityTarget;
import org.snmp4j.PDU;
import org.snmp4j.Snmp;
import org.snmp4j.Target;
import org.snmp4j.TransportMapping;
import org.snmp4j.event.ResponseEvent;
import org.snmp4j.mp.SnmpConstants;
import org.snmp4j.smi.Address;
import org.snmp4j.smi.GenericAddress;
import org.snmp4j.smi.OID;
import org.snmp4j.smi.OctetString;
import org.snmp4j.smi.VariableBinding;
import org.snmp4j.transport.DefaultUdpTransportMapping;

/**
 *
 * @author Noor
 */
public class SnmpClients {

    Snmp snmp = null;
    String address = null;

    public SnmpClients(String add) {
        address = add;
    }

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        try {
            SnmpClients client = new SnmpClients("udp:127.0.0.1/161");
            client.start();
            String sysDescr = client.getAsString(new OID(".1.3.6.1.2.1.1.1.0"));
            String sysObj = client.getAsString(new OID(".1.3.6.1.2.1.1.2.0"));
            String uptime = client.getAsString(new OID(".1.3.6.1.2.1.1.3.0"));            
            String SystemContact = client.getAsString(new OID(".1.3.6.1.2.1.1.4.0"));
            String Name = client.getAsString(new OID(".1.3.6.1.2.1.1.5.0"));
            String SysLoc = client.getAsString(new OID(".1.3.6.1.2.1.1.6.0"));
            String sysServ = client.getAsString(new OID(".1.3.6.1.2.1.1.7.0"));
           // String s="System Description:  "+sysDescr+"\nSystem Object Id : "+sysObj+"\nUptime :  "+uptime+"\nSystem Contact:  "+SystemContact+"\nName:  "+Name+"\nSystem Location:  "+SysLoc+"\nSystem Service :  "+sysServ+"\n";
            SysFrame ss = new SysFrame();
            //ss.setText(s);
            ss.setTxtDesc(sysDescr);
            ss.setTxtObj(sysObj);
            ss.setTxtCont(SystemContact);
            ss.setTxtLocation(SysLoc);
            ss.setTxtName(Name);
            ss.setTxtService(sysServ);
            ss.setTxtUp(uptime);
            ss.setVisible(true);
        } catch (IOException ex) {
            Logger.getLogger(SnmpClients.class.getName()).log(Level.SEVERE, null, ex);
        }


    }

    private void start() throws IOException {

        TransportMapping transport = new DefaultUdpTransportMapping();

        snmp = new Snmp(transport);
// Do not forget this line!
        transport.listen();

    }

    public String getAsString(OID oid) throws IOException {
        ResponseEvent event = get(new OID[]{oid});
        return event.getResponse().get(0).getVariable().toString();
    }

    public ResponseEvent get(OID oids[]) throws IOException {
        PDU pdu = new PDU();
        for (OID oid : oids) {
            pdu.add(new VariableBinding(oid));
        }
        pdu.setType(PDU.GET);
        ResponseEvent event = snmp.send(pdu, getTarget(), null);
        if (event != null) {
            return event;
        }
        throw new RuntimeException("GET timed out");
    }

    private Target getTarget() {
        Address targetAddress = GenericAddress.parse(address);
        CommunityTarget target = new CommunityTarget();
        target.setCommunity(new OctetString("public"));
        target.setAddress(targetAddress);
        target.setRetries(2);

        target.setTimeout(1500);

        target.setVersion(SnmpConstants.version2c);

        return target;

    }

}

