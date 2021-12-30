import java.util.LinkedList;

//@Stateful
public class PointsBean {
    private LinkedList<AreaCheckServlet.Point> points = new LinkedList<>();

    public PointsBean(){
    }

    public PointsBean(AreaCheckServlet.Point point){
        points.add(point);
    }

    public void setPoints(AreaCheckServlet.Point points) {
        this.points.add(points);
    }

    public LinkedList<AreaCheckServlet.Point> getPoints() {
        return points;
    }

}