import java.io.IOException;
import javax.servlet.http.*;
public class ControllerServlet extends javax.servlet.http.HttpServlet {
    protected void doPost(HttpServletRequest request, HttpServletResponse response) throws javax.servlet.ServletException, IOException {
        request.getServletContext().getRequestDispatcher("/index.jsp").forward(request,response);
    }

    protected void doGet(HttpServletRequest request, HttpServletResponse response) throws javax.servlet.ServletException, IOException {
        String x = request.getParameter("selectx");
        String y = request.getParameter("texty");
        String r = request.getParameter("selectr");
        System.out.println("Enter parameter:\nX:"+x+"\nY:"+y+"\nR:"+r);
        if (x == null || y == null || r == null){
            request.getServletContext().getRequestDispatcher("/index.jsp").forward(request,response);
        }else{
            request.getServletContext().getRequestDispatcher("/check_area").forward(request,response);
        }
    }
}