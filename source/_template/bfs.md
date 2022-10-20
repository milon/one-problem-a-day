---
extends: _layouts.template
section: content
title: Breadth first search (BFS)
tags: [graph]
---

We have to use a queue to structure the nodes that we have to visit. We will start with the root node and add it to the queue. Then we will pop the node from the queue and add it to the result. Then we will add all the neighbors of the node to the queue. We will repeat this process until the queue is empty.

```python
graph = {
    0 : [1,6],
    1 : [0,2,3],
    2 : [1,4],
    3 : [1,4,5],
    4 : [2,3,5],
    5 : [3,4],
    6 : [0]
}

def bfs(graph: Dict[int, List[int]], node: int):
    q = deque([node])
    visited = set([node])
    res = []

    while q:
        cur = q.pop()
        res.append(cur)
        for neighbor in graph[cur]:
            if neighbor in visited: continue
            q.appendleft(neighbor)
            visited.add(neighbor)
    
    return res
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`