---
extends: _layouts.post
section: content
title: Course schedule II
problemUrl: https://leetcode.com/problems/course-schedule-ii/
date: 2022-07-16
categories: [graph]
---

This is a classing cycle detect graph problem. We will first convert our edge list to adjacency list. Then we use white-grey-black algorithm to detect cycle. At first every node will be in our white list. When we start traversing using DFS, we mark the graph as grey(adding it to the grey set). Then we go until the end of it's neighbour, if we found another grey node, that means we have a cycle, we return an empty array immediately. If we don't have cycle, then we mark the node as black(adding it to the visited set and remove it from the visiting set, also adding the node to our result array). If we can traverse the whole graph without any cycle, that means it is possible to take all the courses, then we return our result array.

```python
class Solution:
    def findOrder(self, numCourses: int, prerequisites: List[List[int]]) -> List[int]:
        graph = self.buildGraph(numCourses, prerequisites)
        visited, visiting = set(), set()
        res = []

        def hasCycle(node):
            if node in visiting:
                return True
            if node in visited:
                return False
            visiting.add(node)
            for neighbor in graph[node]:
                if hasCycle(neighbor):
                    return True
            visiting.remove(node)
            visited.add(node)
            res.append(node)
            return False

        for course in range(numCourses):
            if hasCycle(course):
                return []
        return res

    def buildGraph(self, numCourses, prerequisites):
        graph = {}
        for i in range(numCourses):
            graph[i] = []
        for a, b in prerequisites:
            graph[a].append(b)
        return graph
```

We iterate through the whole courses to build our adjacency list. We also iterate through our prerequisites list. Then we dfs the graph, which is done in O(n) time. So, our overall time complexity is `O(n+p)` where n is the number of courses and p is the number of prerequisites. Our space complexity is also `O(n+p)` as to build out adjacency list, we have n courses and each course could have p prerequisites in worst case.