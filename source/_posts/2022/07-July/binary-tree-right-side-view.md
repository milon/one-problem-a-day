---
extends: _layouts.post
section: content
title: Binary tree right side view
problemUrl: https://leetcode.com/problems/binary-tree-right-side-view/
date: 2022-07-11
categories: [tree]
---

This problem asked us to return the list of the nodes when we look it from the right side. That means, if we traverse the whole tree with BFS, we will see the right side node of the tree in each level. So we can just traverse the tree with BFS and at the end of each level of traverse, we will store the last value on our result list. Then when the whole tree traverse is done, we can just return it.

```python
# Definition for a binary tree node.
# class TreeNode:
#     def __init__(self, val=0, left=None, right=None):
#         self.val = val
#         self.left = left
#         self.right = right

class Solution:
    def rightSideView(self, root: Optional[TreeNode]) -> List[int]:
        if not root:
            return []

        result = []
        q = deque([root])

        while q:
            qLen = len(q)
            for _ in range(qLen):
                node = q.popleft()
                if node.left:
                    q.append(node.left)
                if node.right:
                    q.append(node.right)
            result.append(node.val)

        return result
```

The solution is very strait forward, we will traverse each node once, so time complexity is `O(n)`. Also in worst case, our queue will store all the nodes of the tree. So the space complexity is also `O(n)`.