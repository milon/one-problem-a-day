---
extends: _layouts.post
section: content
title: Minimum number of vertices to reach all nodes
problemUrl: https://leetcode.com/problems/minimum-number-of-vertices-to-reach-all-nodes/
date: 2022-11-06
categories: [graph]
---

We can just return all nodes with on incoming edge. Necesssary condition for this to work is to have all nodes with no in-degree must in the final result, because they can not be reached from. All other nodes can be reached from any other nodes. This can only happen if all nodes can be reached form some other nodes.

```python
class Solution:
    def findSmallestSetOfVertices(self, n: int, edges: List[List[int]]) -> List[int]:
        return list(set(range(n)) - set([d for s, d in edges]))
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`